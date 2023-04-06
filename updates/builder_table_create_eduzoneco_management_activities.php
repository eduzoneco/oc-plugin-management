<?php namespace Eduzoneco\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEduzonecoManagementActivities extends Migration
{
    public function up()
{
    Schema::create('eduzoneco_management_activities', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->integer('lesson_id');
        $table->string('type')->nullable();
        $table->string('title')->nullable();
        $table->string('description')->nullable();
        $table->string('difficulty')->nullable();
        $table->integer('estimated_duration')->nullable();
        $table->boolean('is_active')->default(0);
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
        $table->timestamp('deleted_at')->nullable();
    });
}

public function down()
{
    Schema::dropIfExists('eduzoneco_management_activities');
}
}
