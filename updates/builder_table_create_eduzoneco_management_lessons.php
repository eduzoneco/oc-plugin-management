<?php namespace Eduzoneco\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEduzonecoManagementLessons extends Migration
{
    public function up()
{
    Schema::create('eduzoneco_management_lessons', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->integer('course_id');
        $table->string('title')->nullable();
        $table->string('description')->nullable();
        $table->text('content')->nullable();
        $table->boolean('is_active')->default(0);
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
        $table->timestamp('deleted_at')->nullable();
    });
}

public function down()
{
    Schema::dropIfExists('eduzoneco_management_lessons');
}
}
