<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('mpd', ['mpd1', 'mpd2', 'mpd3', 'mpd4'])->nullable();
            $table->enum('filler', ['a1', 'a2', 'b1', 'b2'])->nullable();
            $table->enum('fuel', ['petrol', 'diesel', 'speed'])->nullable();
            $table->unsignedInteger('cash')->nullable();
            $table->unsignedInteger('checque')->nullable();
            $table->unsignedInteger('card')->nullable();
            $table->unsignedInteger('paytm')->nullable();
            $table->string('comment')->nullable();
            $table->string('bal_amt')->nullable();
            $table->date('insert_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
