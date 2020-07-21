<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcontractorworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcontractorworks', function (Blueprint $table) {

            /**
             * Table information
             */
            $table->increments('id');
            $table->string('transaction_no');
            $table->dateTime('transaction_date');

            $table->integer('subcontractor')->unsigned();
            $table->integer('equipment')->unsigned();

            $table->string('project');
            $table->string('scope_of_work');
            $table->dateTime('project_start_date');

            $table->decimal('percentage_status')->default(0);
            $table->decimal('contract_amount')->unsigned();
            $table->decimal('total_previous_paid_amount')->default(0);
            $table->decimal('total_current_paid_amount')->default(0);
            $table->decimal('total_amount_due_left')->default(0);

            $table->integer('created_user_id')->unsigned();
            $table->integer('updated_user_id')->unsigned();

            $table->index('equipment');

            $table->string('status')->default('in-progress');
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
        Schema::dropIfExists('subcontractorworks');
    }
}
