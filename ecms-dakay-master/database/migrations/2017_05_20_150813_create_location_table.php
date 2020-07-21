<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            /**
             * Table information
             */
            $table->increments('id');
            $table->integer('created_user_id')->unsigned();
            $table->string('name')->unique();

            $table->dateTime('location_date');
            $table->string('address')->nullable();
            $table->string('contact_person', 255)->nullable();
            $table->string('phone_no', 56)->nullable();
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
        Schema::dropIfExists('locations');
    }
}
