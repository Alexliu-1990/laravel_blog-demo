<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        for($i = 1; $i <=20 ;$i++){
            $content            = $faker->paragraph($nbSentences = 30);
            $post               = new Post;
            $post->title        = $faker->sentence($nbWords = 3);
            $post->content      = $content;
            $post->read_more    = substr($content, 0, 120);
            $post->save();

            $max_Comments       = mt_rand(3, 15);
            for ($j = 1; $j <= $max_Comments; $j++)
            {
                $comment                    = new Comment;
                $comment->commenter         = $faker->name;
                $comment->comment           = $faker->paragraph($nbSentences = 3);
                $comment->email             = $faker->email;
                $post->comments()->save($comment);
                $post->increment('comment_count');
            }
        }

	}

}
