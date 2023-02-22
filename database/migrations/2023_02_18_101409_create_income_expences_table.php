<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeExpencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_expences', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('item');
            $table->string('description');
            $table->string('amount');
            $table->string('currency');
            $table->string('date');
            $table->timestamps();

            // type	item	description	amount	currency	date	created_at	updated_at	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_expences');
    }
}
