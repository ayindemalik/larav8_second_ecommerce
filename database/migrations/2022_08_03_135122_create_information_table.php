<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('info_title_en');
            $table->string('info_title_fr');
            $table->string('info_title_ar');

            $table->string('info_tags_en')->nullable();
            $table->string('info_tags_fr')->nullable();
            $table->string('info_tags_ar')->nullable();

            $table->string('info_body_en')->nullable();
            $table->string('info_body_fr')->nullable();
            $table->string('info_body_ar')->nullable();

            $table->string('info_image')->nullable();
            $table->string('category')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('information');
    }
}
