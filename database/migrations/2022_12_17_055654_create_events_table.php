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
        Schema::dropIfExists('events');
        Schema::create('events', function (Blueprint $table) {
            $table->unsignedBigInteger('idevent')->primary(); // this is the auto-incrementing primary key
            $table->string('title');
            $table->string('desctiption');
            $table->string('who');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('location');
            $table->unsignedBigInteger('idemp');
            $table->foreign('idemp')
                ->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('events');
    }
};
