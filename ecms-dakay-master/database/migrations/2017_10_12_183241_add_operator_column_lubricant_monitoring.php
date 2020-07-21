<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOperatorColumnLubricantMonitoring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lubricant_monitoring', function (Blueprint $table) {
            $table->integer('operator')->after('equipment')->nullable();
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
            $table->dropColumn('operator');
        });
    }
}
