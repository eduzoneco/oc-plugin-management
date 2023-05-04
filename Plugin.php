<?php namespace Eduzoneco\Management;

use System\Classes\PluginBase;
use Event;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            \Eduzoneco\Management\Components\CourseList::class => 'CourseList',
        ];
    }

    public function registerSettings()
    {
    }
    // public function boot(){
    //     Event::listen('rainlab.user.logout', function ($user) {
    //         $content = $content . 'B';
    //     });
    // }
}
