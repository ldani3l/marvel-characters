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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->integer('idMarvel');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('resourceURI');
            $table->integer('score')->nullable();
            //$table->text('comment');
            $table->text('urlimg')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id','character_fk_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('restrict');
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
        Schema::dropIfExists('characters');
    }
};
