<?php namespace Eduzoneco\Management\Components;

use Cms\Classes\ComponentBase;
use Eduzoneco\Management\Models\Course;
/**
 * CourseList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class CourseList extends ComponentBase  
{
    public function componentDetails()
    {
        return [
            'name' => 'CourseList Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];

    }
    public function onRun(){
        $courses = Course::all();//laravel 
        $this->page['courses'] = $courses; //variable disponible en twig  para pasar a todas las paginas que tiene ese component
    }
   
}
