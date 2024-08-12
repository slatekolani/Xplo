<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTourPriceFromCustomTourBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_tour_booking', function (Blueprint $table) {
            $table->dropColumn('tour_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_tour_booking', function (Blueprint $table) {
            $table->integer('tour_price');
        });
    }
}
