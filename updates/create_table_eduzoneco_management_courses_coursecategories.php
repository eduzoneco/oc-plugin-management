<?php namespace Eduzoneco\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTableEduzonecoManagementCoursesCoursecategories extends Migration
{
    public function up()
    {
        Schema::create('eduzoneco_management_courses_coursecategories', function($table)
        {
            $table->integer('course_id')->unsigned();
            $table->integer('coursecategory_id')->unsigned();
            $table->primary(['course_id', 'coursecategory_id'], 'course_coursecategory');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('eduzoneco_management_courses_coursecategories');
    }
}