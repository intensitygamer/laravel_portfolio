<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcontractorworkPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcontractorwork_payments', function (Blueprint $table) {

            /**
             * Table information
             */
            $table->increments('id');
            $table->integer('subcontractorwork_id')->unsigned();

            $table->decimal('percentage_status')->default(0);
            $table->decimal('contract_amount')->unsigned();
            $table->decimal('previous_paid_amount')->default(0);
            $table->decimal('current_paid_amount')->default(0);
            $table->decimal('amount_due_left')->default(0);

            $table->integer('created_user_id')->unsigned();

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
        Schema::dropIfExists('subcontractorwork_payments');
    }
}
