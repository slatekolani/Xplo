<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristicAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('touristic_attraction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attraction_name')->index();
            $table->string('attraction_description');
            $table->string('attraction_category');
            $table->string('attraction_region');
            $table->string('best_time_of_visit');
            $table->string('governing_body');
            $table->string('website_link');
            $table->longText('basic_information');
            $table->longText('attraction_details');
            $table->longText('attraction_map');
            $table->string('attraction_image');
            $table->string('uuid',100)->unique();
            $table->string('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('touristic_attraction');
    }
}
