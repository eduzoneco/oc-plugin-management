<?php namespace Eduzoneco\Management\Models;

use Model;

/**
 * Model
 */
class Activity extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'eduzoneco_management_activities';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $belongsTo = [
        'lesson' => [\Eduzoneco\Management\Models\Lesson::class]
    ];

    public function getTypeOptions(){
        return [
            'lecture' => 'Lecture',
            'quiz' => 'Quiz',
            'exam' => 'Exam',
        ];
    }
    public function getDifficultyOptions(){
        return [
            'low' => 'Low',
            'med' => 'Medium',
            'high' => 'High',
        ];
    }
}
