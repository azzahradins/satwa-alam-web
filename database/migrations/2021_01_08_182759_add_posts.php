<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_animals');
            $table->string('type')->nullable();
            $table->string('photo');
            $table->bigInteger('lat')->nullable();
            $table->bigInteger('long')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->boolean('verified')->default(false);
            $table->timestamps();

            $table->foreign('id_animals')->references('id')->on('animals')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
