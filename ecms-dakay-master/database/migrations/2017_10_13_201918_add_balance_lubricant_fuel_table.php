<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBalanceLubricantFuelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lubricant_monitoring', function (Blueprint $table) {
            $table->integer('balance')->after('total_consumption_per_unit')->default(0);
        });

        Schema::table('fuel_monitoring', function (Blueprint $table) {
            $table->integer('balance')->after('total_consumption_per_unit')->default(0);
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
            $table->dropColumn('balance');
        });

        Schema::table('fuel_monitoring', function (Blueprint $table) {
            $table->dropColumn('balance');
        });
    }
}
