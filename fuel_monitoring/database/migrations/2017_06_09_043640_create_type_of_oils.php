<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeOfOils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_oils', function (Blueprint $table) {
            /**
             * Table information
             */
            $table->increments('id');
            $table->string('name', 1000);
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
        Schema::dropIfExists('type_of_oils');
    }
}
