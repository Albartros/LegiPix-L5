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
        Schema::create('news_categories', function(Blueprint $table)
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

        Schema::create('news', function(Blueprint $table)
        {
            // Default Fields
            $table->increments('id');
            $table->string('name');
            $table->string('slug');

            $table->text('text');

            // Statistics
            $table->integer('views')->unsigned()->default(0);

            // Relationships
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('news_categories');

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
        Schema::drop('news');
        Schema::drop('news_categories');
    }

}
