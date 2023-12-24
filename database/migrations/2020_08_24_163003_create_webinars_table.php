<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
        Schema::create('webinars', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('banner')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('level_id')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('private')->nullable();
            $table->string('duration')->nullable();
            $table->string('sublevel_id')->nullable();
            $table->string('type')->nullable();
            $table->integer('teacher_id')->unsigned();
            $table->integer('creator_id')->unsigned();
            $table->integer('category_id')->unsigned()->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('title', 64)->nullable();
            $table->integer('start_date')->nullable();
            $table->integer('end_date')->nullable();
            $table->string('slug')->nullable();
            $table->string('image_cover')->nullable();
            $table->string('video_demo')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('capacity')->unsigned()->nullable();
            $table->float('price', 15, 3)->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->boolean('support')->default(false);
            $table->boolean('partner_instructor')->default(false);
            $table->boolean('subscribe')->default(false);
            $table->text('message_for_reviewer')->nullable();
            $table->enum('status', ['active', 'pending', 'is_draft', 'inactive']);
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinars');
    }
}
