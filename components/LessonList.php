<?php namespace Eduzoneco\Management\Components;

use Cms\Classes\ComponentBase;
use Eduzoneco\Management\Models\{Lesson, Course};


/**
 * LessonList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class LessonList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'LessonList Component',
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

    public function onRender(){
        //$properties = $this->getProperties();
        $courseId = $this->property('courseId');
        $course = Course::where('id', '=', $courseId)->first();
        if ($course && $course->is_active == 1)
        {
            $lessons = $course->lessons;
            //$lessons = Lesson::where('course_id', '=', $courseId)->get();
            $this->page['lessons'] = $lessons;
        }


    }
}
