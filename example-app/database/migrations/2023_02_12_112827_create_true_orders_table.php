<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('true_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('user_id')->references('id')->on('users');
            $table->string('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('true_orders');
    }
};
