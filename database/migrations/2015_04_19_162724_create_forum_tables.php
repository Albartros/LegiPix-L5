<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums_categories', function(Blueprint $table)
        {
            // Default Fields
            $table->increments('id');
            $table->string('name');

            $table->string('text');

            // Metadata
            $table->integer('position');
        });

        Schema::create('forums', function(Blueprint $table)
        {
            // Default Fields
            $table->increments('id');
            $table->string('name');
            $table->string('slug');

            $table->string('text');
            $table->string('thumbnail')->default('default.png');

            // Metadata
            $table->string('tag')->nullable()->default(null);
            $table->integer('position')->unsigned();

            // Statistics
            $table->integer('topics')->unsigned()->default(0);
            $table->integer('posts')->unsigned()->default(0);

            // Relationships
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('forums_categories');

            // Timestamps
            $table->timestamps();
        });

        Schema::create('topics', function(Blueprint $table)
        {
            // Default Fields
            $table->increments('id');
            $table->string('name');
            $table->string('slug');

            // Metadata
            $table->boolean('locked')->default(false);
            $table->boolean('pinned')->default(false);
            $table->boolean('tagged')->default(false);
            $table->integer('last_post_id')->unsigned();

            // Statistics
            $table->integer('views')->default(0);
            $table->integer('posts')->default(1);

            // Relationships
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('forum_id')->unsigned();
            $table->foreign('forum_id')->references('id')->on('forums');

            // Timestamps
            $table->timestamps();
            $table->timestamp('anwsered_at');
            $table->softDeletes();
        });

        Schema::create('posts', function(Blueprint $table)
        {
            // Default Fields
            $table->increments('id');

            $table->text('text');

            // Relationships
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id')->on('topics');

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
        Schema::drop('topics');
        Schema::drop('forums');
        Schema::drop('forums_categories');
    }

}
