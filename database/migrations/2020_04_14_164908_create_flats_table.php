<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('address');
            $table->string('title');
            $table->integer('rooms');
            $table->decimal('mq', 6, 2);
            $table->string('cover');
            $table->string('guest')->nullable();
            $table->text('description');
            $table->decimal('price_day', 6, 2);
            $table->integer('beds');
            $table->integer('bathrooms');
            $table->integer('lat');
            $table->integer('long');
            $table->string('slug');
            $table->boolean('hidden');
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
        Schema::dropIfExists('flats');
    }
}
