<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            /**
             * Laravel Defaults...
             */
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();

            /**
             * Editable Fields...
             */
            $table->text('text')->nullable()->default(null);
            $table->string('avatar')->default('default.png');

            $table->string('ctc_facebook')->nullable()->default(null);
            $table->string('ctc_internet')->nullable()->default(null);
            $table->string('ctc_playstation')->nullable()->default(null);
            $table->string('ctc_skype')->nullable()->default(null);
            $table->string('ctc_steam')->nullable()->default(null);
            $table->string('ctc_twitch')->nullable()->default(null);
            $table->string('ctc_twitter')->nullable()->default(null);
            $table->string('ctc_xbox_live')->nullable()->default(null);
            $table->string('ctc_youtube')->nullable()->default(null);

            /**
             * Application Fields...
             */

            // Statistics
            $table->integer('nbr_comments')->unsigned()->default(0);
            $table->integer('nbr_posts')->unsigned()->default(0);
            $table->integer('nbr_topics')->unsigned()->default(0);

            // Confirmation Status
            $table->boolean('confirmed')->default(false);
            $table->string('confirmation_code');

            // Timestamps
            $table->timestamps();
            $table->timestamp('banned_until')->nullable()->default(null);
            $table->timestamp('online_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
