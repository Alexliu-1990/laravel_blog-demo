<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Postandcomments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('read_more');
            $table->text('content');
            $table->unsignedInteger('comment_count');
			$table->timestamps();
            $table->engine='MYISAM';
        });
        DB::statement('ALTER TABLE posts ADD FULLTEXT search(title, content)');

        Schema::create('comments', function(Blueprint $table){

            $table->increments('id');
            $table->string('commenter');
            $table->string('email');
            $table->text('comment');
            $table->unsignedInteger('post_id');
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
        Schema::table('posts', function(Blueprint $table) {
                $table->dropIndex('search');
                $table->drop();
        });
        Schema::table('comments', function(Blueprint $table) {
                $table->drop();
        });
    }
}
