<?php namespace Eduzoneco\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTableEduzonecoManagementCoursesUsers extends Migration
{
    public function up()
    {
        Schema::create('eduzoneco_management_courses_users', function($table)
        {
            $table->integer('course_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->primary(['course_id', 'user_id'], 'course_user');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('eduzoneco_management_courses_users');
    }
}