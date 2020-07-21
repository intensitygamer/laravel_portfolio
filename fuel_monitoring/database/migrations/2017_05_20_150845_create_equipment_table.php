<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            /**
             * Table information
             */
            $table->increments('id');
            $table->integer('created_user_id')->unsigned();
            $table->string('equipment_code', 255);
            $table->string('equipment_description')->nullable();
            $table->string('equipment_make', 255)->nullable();
            $table->string('equipment_model', 255)->nullable();
            $table->string('for_hauling', 6)->nullable();
            $table->string('capacity', 255)->nullable();

            //added other equipment model
            $table->dateTime('equipment_date');
            $table->string('equipment_type', 255)->nullable();
            $table->string('engine_displacement', 255)->nullable();
            $table->string('engine_code', 255)->nullable();
            $table->string('engine_no', 255)->nullable();
            $table->string('chassis_no', 255)->nullable();
            $table->string('body_no', 255)->nullable();
            $table->string('color', 255)->nullable();
            $table->string('fuel', 255)->nullable();

            $table->string('status')->default('active');

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
        Schema::dropIfExists('equipments');
    }
}
