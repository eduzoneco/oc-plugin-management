<?php namespace Eduzoneco\Management\Components;

use Cms\Classes\ComponentBase;
use Eduzoneco\Management\Models\{Lesson, Course, Activity};


/**
 * ActivityDetail Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class ActivityDetail extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'ActivityDetail Component',
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

    public function onUpdateContent() {
        $this->page['activity'] = Activity::where('id', $_POST['activity_id'])->first();
    }

    public function onRender(){
      
        $properties = $this->getProperties();
        $courseId = $this->property('courseId');
        $course = Course::where('id', '=', $courseId)->first();
        if ($course && $course->is_active == 1)
        {
            $lessons = $course->lessons;
            // $firstLesson = $lessons->first();
            // $firstActivity = $firstLesson->activities->first();
            // $this->page['activity'] = $firstLesson->activities->first();
            $this->page['lessons'] = $lessons;
            $this->page['course'] = $course;
        }


    }
}
