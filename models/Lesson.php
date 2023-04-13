<?php namespace Eduzoneco\Management\Models;

use Model;

/**
 * Model
 */
class Lesson extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
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
}
