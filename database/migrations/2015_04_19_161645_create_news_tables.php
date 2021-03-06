<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_categories', function(Blueprint $table)
        {
            // Default Fields
            $table->increments('id');
            $table->string('name');
            $table->string('slug');

            $table->string('text');

            // Metadata
            $table->integer('position')->unsigned();

            // Timestamps
            $table->timestamps();
        });

        Schema::create('articles', function(Blueprint $table)
        {
            // Default Fields
            $table->increments('id');
            $table->string('name');
            $table->string('slug');

            $table->text('text');
            $table->string('thumbnail')->default('default.png');

            // Statistics
            $table->integer('comments')->unsigned()->default(0);
            $table->integer('views')->unsigned()->default(0);

            // Relationships
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('articles_categories');

            // Metadata
            $table->boolean('featured')->default(false);

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
        Schema::drop('articles');
        Schema::drop('articles_categories');
    }

}
