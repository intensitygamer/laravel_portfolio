<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLubricantMonitoringLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lubricant_monitoring_logs', function (Blueprint $table) {
            /**
             * Table information
             */
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('username')->nullable();
            $table->string('remarks');

            $table->string('oil');
            $table->string('type');
            $table->integer('previous_value')->nullable();
            $table->integer('added_value')->nullable();
            $table->integer('updated_value')->nullable();

            $table->timestamps();
            $table->softDeletes();
            /**
             * Database engine
             */
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lubricant_monitoring_logs');
    }
}
