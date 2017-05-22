<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++){
            $data = [
                'title' => str_random(30),
                'body' => str_random(4000),
            ];
            $data['slug'] = str_replace("", "", $data['title']);
            \DB::table('articles')->insert($data);
        }
    }
}
