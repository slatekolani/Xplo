<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalTourPackageCollectionStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_tour_package_collection_stop', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('collection_stop_name');
            $table->string('collection_stop_price');
            $table->time('pick_up_time');
            $table->unsignedBigInteger('local_tour_package_id');
            $table->unsignedBigInteger('tour_operator_id');
            $table->string('uuid',100);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('local_tour_package_collection_stop',function (Blueprint $table){
            $table->foreign('local_tour_package_id')->references('id')->on('local_tour_package')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('tour_operator_id')->references('id')->on('tour_operator')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local_tour_package_collection_stop');
    }
}
