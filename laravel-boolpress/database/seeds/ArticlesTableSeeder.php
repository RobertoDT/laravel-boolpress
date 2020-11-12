<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Article;
use App\User;
use App\Tag;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      for($i = 0; $i < 10; $i++){
        $user = User::inRandomOrder()->first();

        $newArticle = new Article;

        $newArticle->user_id = $user->id;
        $newArticle->title = $faker->sentence(3, true);
        $newArticle->content = $faker->paragraph(3, true);
        $newArticle->slug = Str::of($newArticle->title)->slug("-");

        $newArticle->save();

        $tags = Tag::inRandomOrder()->limit(5)->get();

        $newArticle->tags()->sync($tags);
      }
    }
}
