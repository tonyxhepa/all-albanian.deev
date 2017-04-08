<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makinas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('car_make_id')->unsigned()->index();
            $table->integer('car_model_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->integer('city_id')->unsigned()->index();
            $table->string('title');
            $table->text('pershkrimi');
            $table->string('slug');
            $table->string('email');
            $table->string('phone');
            $table->integer('viti');
            $table->string('karburanti');
            $table->string('kamio');
            $table->string('dogana');
            $table->string('ngjyra');
            $table->string('km');
            $table->integer('price');
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
        Schema::dropIfExists('makinas');
    }
}
