<?php namespace Eduzoneco\Management\Components;
use Auth;
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
        //$courses = Course::all();//laravel 
        //$this->page['courses'] = Course::where('is_active', 1)->get(); //variable disponible en twig  para pasar a todas las paginas que tiene ese component
        $user = Auth::user(); // Obtener el usuario autenticado
        $this->page['courses'] = $user->courses()->where('is_active', 1)->get();
    }
   
}
