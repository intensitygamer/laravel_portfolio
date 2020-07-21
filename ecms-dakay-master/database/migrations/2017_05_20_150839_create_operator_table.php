<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
            /**
             * Table information
             */
            $table->increments('id');
            $table->integer('created_user_id')->unsigned();
            $table->string('name', 1000);
            $table->string('alias', 520)->nullable();
            $table->string('license_no', 520)->nullable();
            $table->string('driver_code', 520)->nullable();

            $table->dateTime('operator_date');
            $table->string('address' )->nullable();
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
        Schema::dropIfExists('operators');
    }
}
