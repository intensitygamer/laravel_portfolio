<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLubricantMonitoring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lubricant_monitoring', function (Blueprint $table) {

            /**
             * Table information
             */
            $table->increments('id');
            $table->string('transaction_no');
            $table->dateTime('transaction_date');
            $table->string('reference_no')->nullable();
            $table->integer('location')->nullable();
            $table->integer('equipment')->nullable();

            $table->integer('type_of_oil_id')->unsigned();
            $table->integer('in')->nullable();
            $table->integer('out')->nullable();
            $table->integer('total_consumption_per_unit')->nullable();

            $table->string('vendor')->nullable();

            $table->integer('created_user_id')->unsigned();
            $table->integer('updated_user_id')->unsigned();
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
        Schema::dropIfExists('lubricant_monitoring');
    }
}
