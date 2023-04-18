<?php namespace Eduzoneco\Management\Models;

use Model;

/**
 * Model
 */
class Course extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'eduzoneco_management_courses';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    public $belongsToMany = [
        'coursecategories' => [
            \eduzoneco\management\models\CourseCategory::class,
            'table' => 'eduzoneco_management_courses_coursecategories',
            'key'=>'course_id',
            'otherKey'=>'coursecategory_id'
            ]
    ];
    public $hasMany = [//va a buscar modelo en este caso course y _id
        'lessons' => [\eduzoneco\management\models\Lesson::class]
    ];
}
