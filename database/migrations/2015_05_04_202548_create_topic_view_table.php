<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicViewTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_view', function(Blueprint $table)
        {
            $table->integer('user_id')->unsigned();
            $table->integer('topic_id')->unsigned();
            $table->integer('forum_id')->unsigned();
            $table->integer('post_id')->unsigned();

            $table->boolean('posted');

            // Setting primary keys
            $table->primary(['user_id', 'topic_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topic_view');
    }

}
