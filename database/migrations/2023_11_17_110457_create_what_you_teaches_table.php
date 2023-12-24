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
        Schema::create('what_you_teaches', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('banner')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('sublevel_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->string('status')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('what_you_teaches');
    }
};
