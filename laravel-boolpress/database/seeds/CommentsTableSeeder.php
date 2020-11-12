<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Comment;
use App\Article;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for($i = 0; $i < 10; $i++){
        $article = Article::inRandomOrder()->first();

        $newComment = new Comment;

        $newComment->article_id = $article->id;
        $newComment->author = $faker->name(50);
        $newComment->content = $faker->paragraph(3, true);

        $newComment->save();
      }
    }
}
