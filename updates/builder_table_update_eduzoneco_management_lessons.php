<?php namespace Eduzoneco\Management\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEduzonecoManagementLessons extends Migration
{
    public function up()
{
    Schema::table('eduzoneco_management_lessons', function($table)
    {
        $table->integer('sort_order')->nullable();
    });
}

public function down()
{
    Schema::table('eduzoneco_management_lessons', function($table)
    {
        $table->dropColumn('sort_order');
    });
}
}
