<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexContents extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Video IDs from YouTube that are featured.
         */
        Schema::create('videos', function(Blueprint $table)
        {
            // Default Fields
            $table->increments('id');
            $table->text('name');

            $table->string('video_id');

            // Timestamps
            $table->timestamps();
        });

        /**
         * Countdowns for the featured and upcoming games.
         */
        Schema::create('countdowns', function(Blueprint $table)
        {
            // Default Fields
            $table->increments('id');
            $table->string('name');

            $table->string('thumbnail');

            // Timestamps
            $table->timestamps();
            $table->timestamp('released_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('countdowns');
        Schema::drop('videos');
    }

}
