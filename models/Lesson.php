<?php namespace Eduzoneco\Management\Models;

use Model;

/**
 * Model
 */
class Lesson extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'eduzoneco_management_lessons';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $belongsTo = [//va a buscar modelo en este caso course y _id
        'course' => [\eduzoneco\management\models\Course::class]
    ];
    public $hasMany = [
        'activities' => [\eduzoneco\management\models\Activity::class]
    ];
    
}
