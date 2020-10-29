<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1 ; $i<=50 ; $i++) {
            factory(\App\Models\Article::class, 1)->create(['url' => 'http://article-posting.herokuapp.com/view/article/detail/'.$i]);

        }
    }
}
