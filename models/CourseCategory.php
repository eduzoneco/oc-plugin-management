<?php namespace Eduzoneco\Management\Models;

use Model;

/**
 * Model
 */
class CourseCategory extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'eduzoneco_management_coursecategories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachMany = [
        "avatar" => 'system\models\file'
    ];
   
}
