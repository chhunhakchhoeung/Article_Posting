<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'slug' => 'sport-new', 'title' => 'Entertainment', 'description' => 'Entertainment new!!!'],
            ['id' => 2, 'slug' => 'sport-new', 'title' => 'Sports', 'description' => 'Sport new!!!'],
            ['id' => 3, 'slug' => 'sport-new', 'title' => 'Technology', 'description' => 'Technology new!!!'],
            ['id' => 4, 'slug' => 'sport-new', 'title' => 'Social', 'description' => 'Social new!!!'],
        ];

        foreach ($data as $record) {
            $create = Category::updateOrCreate(
                ['id' => $record['id']],
                [
                    'slug' => $record['slug'],
                    'title' => $record['title'],
                    'description' => $record['description'],
                ]
            );
        }
    }
}
