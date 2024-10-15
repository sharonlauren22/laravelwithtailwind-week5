<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Article::factory(20)
        //     ->has(Comment::factory(rand(2)))
        //     ->create();
    
        $articles = Article::factory(20)->create();
        foreach ($articles as $data) {
            $article_id = $data->pluck('id');
            $comments = Comment::factory(rand(1, 5))->make(['article_id' => $article_id]);

            $data->comments()->saveMany($comments);
        }
        // for($i = 0; $i < 10; $i++) {
        //     DB::table('articles')->insert([
        //         'title' => fake()->text(20),
        //         'article' => fake()->text(),
        //         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        //     ]);
        // }
    }
}
