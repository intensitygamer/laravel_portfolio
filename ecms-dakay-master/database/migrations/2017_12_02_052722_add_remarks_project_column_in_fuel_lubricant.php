<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemarksProjectColumnInFuelLubricant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lubricant_monitoring', function (Blueprint $table) {
            $table->string('project')->after('operator')->nullable();
            $table->string('remarks')->after('project')->nullable();
        });

        Schema::table('fuel_monitoring', function (Blueprint $table) {
            $table->string('project')->after('operator')->nullable();
            $table->string('remarks')->after('project')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lubricant_monitoring', function (Blueprint $table) {
            $table->dropColumn('project');
            $table->dropColumn('remarks');
        });

        Schema::table('fuel_monitoring', function (Blueprint $table) {
            $table->dropColumn('project');
            $table->dropColumn('remarks');
        });
    }
}
