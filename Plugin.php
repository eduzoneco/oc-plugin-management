<?php namespace Eduzoneco\Management;

use System\Classes\PluginBase;
use Event;
use Backend;

class Plugin extends PluginBase
{

    public $require = [
        'RainLab.User',
    ];

    public function registerComponents()
    {
        return [
            \Eduzoneco\Management\Components\CourseList::class => 'CourseList',
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


    public function boot(){
        $this->extendMenuItemRainlabUser();
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
}
