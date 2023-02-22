<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name_en');
            $table->string('project_name_fr');
            $table->string('short_descp_en');
            $table->string('short_descp_fr');
            $table->string('long_descp_en');
            $table->string('long_descp_fr');
            $table->string('project_owner');
            $table->string('project_price');
            $table->string('project_exec_time_en')->nullable();
            $table->string('project_exec_time_fr')->nullable();
            $table->string('project_thambnail');
            $table->string('execution_status_fr')->nullable();
            $table->string('execution_status_en')->nullable();
            $table->integer('view_status')->default(0);
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
        Schema::dropIfExists('projects');
    }
}
