<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcontractorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcontractors', function (Blueprint $table) {
            /**
             * Table information
             */
            $table->increments('id');
            $table->integer('created_user_id')->unsigned();
            $table->string('name', 255);
            $table->string('address')->nullable();
            $table->string('contact_1', 255)->nullable();
            $table->string('contact_2', 255)->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('subcontractors');
    }
}
