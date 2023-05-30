<?php namespace Eduzoneco\Management\Models;

use Model;

/**
 * Model
 */
class Activity extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\Sortable;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'eduzoneco_management_activities';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'type' => 'required',
        'lesson' => 'required',
        'title' => 'required',
        'description' => 'required'
    ];
    public $belongsTo = [
        'lesson' => [\Eduzoneco\Management\Models\Lesson::class]
    ];

    public $attachOne = [
        'video' => \System\Models\File::class
    ];

    public $attachMany = [
        'files' => \System\Models\File::class
    ];

    public function getTypeOptions(){
        return [
            'lecture' => 'Lecture',
            'quiz' => 'Quiz',
            'exam' => 'Exam',
        ];
    }
    public $implement = [
        \RainLab\Translate\Behaviors\TranslatableModel::class
    ];

    public $translatable = ['type', 'lesson', 'title', 'difficulty', 'description'];
}
