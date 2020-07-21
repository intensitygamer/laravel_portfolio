<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                /**
                 * Table information
                 */
                $table->increments('id');
                $table->integer('created_user_id')->unsigned();
                $table->integer('location')->unsigned();
                $table->string('name')->unique();
                $table->timestamps();
                $table->softDeletes();

                /**
                 * Database engine
                 */
                $table->engine = 'InnoDB';
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('projects');
    }
}
