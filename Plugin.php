<?php namespace Eduzoneco\Management;

use System\Classes\PluginBase;
use Event;
use Backend;
use RainLab\User\Models\User as UserFrontEndModel;

class Plugin extends PluginBase
{

    public $require = [
        'RainLab.User',
    ];

    public function boot(){
        
        $this->extendUserFrontEndModel();
        $this->extendUserBackendForm();
        $this->extendMenuItemRainlabUser();
    }

    public function registerComponents()
    {
        return [
            \Eduzoneco\Management\Components\CourseList::class => 'CourseList',
            \Eduzoneco\Management\Components\LessonList::class => 'LessonList',
        ];
    }

    public function registerSettings()
    {
    }
    
    public function registerPermissions()
    {
        return [
            'eduzoneco.management.importuser' => [
                'tab'   => 'eduzoneco.management::lang.permissions.importuser.tab',
                'label' => 'eduzoneco.management::lang.permissions.importuser.label',
            ],
            'eduzoneco.management.exportuser' => [
                'tab'   => 'eduzoneco.management::lang.permissions.exportuser.tab',
                'label' => 'eduzoneco.management::lang.permissions.exportuser.label',
            ],
        ];
    }



    public function extendMenuItemRainlabUser() {

        Event::listen('backend.menu.extendItems', function($manager)
        {
            $manager->addSideMenuItems('RainLab.User', 'user', [
                'users' => [
                    'label'       => 'rainlab.user::lang.users.menu_label',
                    'url'         => Backend::url('rainlab/user/users'),
                    'icon'        => 'icon-user',
                    'permissions' => ['rainlab.users.*'],
                    'order'       => 100,
                ],
                'import' => [
                    'label'       => 'eduzoneco.management::lang.user.list.import',
                    'url'         => Backend::url('eduzoneco/management/userimportexport/import'),
                    'icon'        => 'icon-sign-in',
                    'permissions' => ['eduzoneco.management.importuser'],
                    'order'       => 200,
                ],
                'export' => [
                    'label'       => 'eduzoneco.management::lang.user.list.export',
                    'url'         => Backend::url('eduzoneco/management/userimportexport/export'),
                    'icon'        => 'icon-sign-out',
                    'permissions' => ['eduzoneco.management.exportuser'],
                    'order'       => 300,
                ],
            ]);
        });

    }

    public function extendUserFrontEndModel()
    {
        UserFrontEndModel::extend(function($model){
            $model->belongsToMany['courses'] = [
                'Eduzoneco\Management\Models\Course',
                'table' => 'eduzoneco_management_courses_users',
            ];
        });
    }

    public function extendUserBackendForm()
    {
        // Extend all backend form usage
        Event::listen('backend.form.extendFields', function($widget) {
            // Only apply this listener when the Users controller is being used
            if (!$widget->getController() instanceof \RainLab\User\Controllers\Users) {
                return;
            }

            // Only apply this listener when the User model is being modified
            if (!$widget->model instanceof \RainLab\User\Models\User) {
                return;
            }

            // Only apply this listener when the Form widget in question is a root-level
            // Form widget (not a repeater, nestedform, etc)
            if ($widget->isNested) {
                return;
            }

            // Add Extrafield Users and courses
            $widget->addFields([
                'courses' => [
                    'label' => 'List of Courses',
                    'type' => 'relation',
                    'span' => 'auto',  
                ]
            ]);
        });
    }
}
