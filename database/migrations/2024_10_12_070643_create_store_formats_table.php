<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreFormatsTable extends Migration
{
    public function up()
    {
        Schema::create('store_formats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->text('name');
            $table->text('title');
            $table->text('tag')->nullable();
            $table->text('description');
            $table->json('data');
            $table->integer('date_store');

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('store_formats');
    }
}