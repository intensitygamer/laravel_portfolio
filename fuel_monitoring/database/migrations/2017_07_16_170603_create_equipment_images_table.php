<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_images', function (Blueprint $table) {
            /**
             * Table information
             */
            $table->increments('id');
            $table->integer('equipment_id')->unsigned();
            $table->string('file_name', 255)->nullable();
            $table->string('file_url', 255)->nullable();
            $table->string('file_mime_type', 255)->nullable();
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
        Schema::dropIfExists('equipment_images');
    }
}
