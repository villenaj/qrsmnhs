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
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->string('username', 191)->primary();
            $table->unsignedBigInteger('idemp');
            $table->foreign('idemp')
                ->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('email', 191);
            $table->string('password', 191);
            $table->string('role', 191);
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
        Schema::dropIfExists('users');
    }
};
