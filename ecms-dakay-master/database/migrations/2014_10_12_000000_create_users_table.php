<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');

            /**
             * Credentials details
             */
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');

            /**
             * Information details
             */
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address', 1000)->nullable();
            $table->string('gender', 6)->nullable();
            $table->string('contact_number', 30)->nullable();
            $table->string('designation', 255)->nullable();
            $table->dateTime('dob')->nullable();
            $table->string('status')->default('unverified');

            /**
             * Roles
             */
            $table->text('permissions')->nullable();


            /**
             * Other details needed
             */
            $table->rememberToken();
            $table->timestamp('last_login')->nullable();
            $table->string('last_login_ip')->default('0.0.0.0');
            $table->string('login_agent')->nullable();
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
        Schema::dropIfExists('users');
    }
}
