<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_title_en');
            $table->string('about_title_fr');
            $table->string('about_shortdescp_en')->nullable();
            $table->string('about_shortdescp_fr')->nullable();
            $table->string('about_longdescp_en')->nullable();
            $table->string('about_longdescp_fr')->nullable();
            $table->string('main_image');
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
        Schema::dropIfExists('abouts');
    }
}
