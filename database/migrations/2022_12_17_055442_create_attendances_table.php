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
        Schema::dropIfExists('attendances');
        Schema::create('attendances', function (Blueprint $table) {
            $table->unsignedBigInteger('idattend')->primary(); // this is the auto-incrementing primary key
            $table->date('date')->nullable();
            $table->dateTime('amin')->nullable();
            $table->dateTime('amout')->nullable();
            $table->dateTime('pmin')->nullable();
            $table->dateTime('pmout')->nullable();
            $table->string('preab')->nullable();
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
        Schema::dropIfExists('attendances');
    }
};
