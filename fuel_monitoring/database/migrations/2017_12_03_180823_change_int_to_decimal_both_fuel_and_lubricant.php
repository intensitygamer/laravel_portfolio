<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIntToDecimalBothFuelAndLubricant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lubricant_monitoring', function (Blueprint $table) {
            $table->decimal('in', 10, 3)->change();
            $table->decimal('out',10, 3)->change();
            $table->decimal('total_consumption_per_unit',10, 3)->change();
            $table->decimal('balance',10, 3)->change();
        });
        Schema::table('lubricant_monitoring_logs', function (Blueprint $table) {
            $table->decimal('previous_value',10, 3)->change();
            $table->decimal('added_value',10, 3)->change();
            $table->decimal('updated_value',10, 3)->change();
        });

        Schema::table('fuel_monitoring', function (Blueprint $table) {
            $table->decimal('in',10, 3)->change();
            $table->decimal('out',10, 3)->change();
            $table->decimal('total_consumption_per_unit',10, 3)->change();
            $table->decimal('balance',10, 3)->change();
        });
        Schema::table('fuel_monitoring_logs', function (Blueprint $table) {
            $table->decimal('previous_value',10, 3)->change();
            $table->decimal('added_value',10, 3)->change();
            $table->decimal('updated_value',10, 3)->change();
        });

        Schema::table('monitoring', function (Blueprint $table) {
            $table->decimal('value',10, 3)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
