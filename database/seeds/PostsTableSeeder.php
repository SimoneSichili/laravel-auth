<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 4; $i++) { 
            // crezione
            $post = new Post();
            //valorizzazione
            $post->title = $faker->sentence(3);
            $post->text = $faker->text(2000);
            $post->user_id = 1;
            //salvataggio
            $post->save();
        }
    }
}
