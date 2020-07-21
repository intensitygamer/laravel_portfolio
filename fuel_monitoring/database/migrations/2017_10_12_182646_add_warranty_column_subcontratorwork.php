<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWarrantyColumnSubcontratorwork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subcontractorworks', function (Blueprint $table) {
            $table->string('warranty')->after('total_amount_due_left')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subcontractorworks', function (Blueprint $table) {
            $table->dropColumn('warranty');
        });
    }
}
