<?php

use App\Models\Article;
use App\Models\ArticlePhoto;
use Illuminate\Database\Seeder;

class AriclePhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count_article = Article::count();
        $get_article = Article::get();

        foreach($get_article as $record){
            ArticlePhoto::updateOrCreate(['article_id' => $record['id']],
                [
                    'name' => 'default-imge',
                    'photo' => 'photo',
                    'path' => 'images/uploads/file/image-default.png',
                    'article_id' => $record['id']
                ]
            );
        }
    }
}
