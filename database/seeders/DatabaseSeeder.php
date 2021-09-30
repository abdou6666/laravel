<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Post;
use Illuminate\Database\Schema\Blueprint;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(1)->create();

        // User::truncate();
        // Category::truncate();
        // Post::truncate();
        $user = User::factory()->create([
            'name' => 'abdou'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);
        // Category::factory(10)->create();
        // $user = User::factory()->create();
        // $personel = Category::create([
        //     'id' => '1',
        //     'name' => 'personel',
        //     'slug' => 'personel'
        // ]);

        // $family = Category::create([
        //     'id' => '2',
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'id' => '3',
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);
        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'my family post',
        //     'slug' => 'my-family-post',
        //     'excerpt' => 'Lorem, ipsum dolor.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, est maxime blanditiis dolorum aliquid officia reprehenderit? Illo molestias recusandae quo nobis enim minus doloribus ipsum, nisi non blanditiis itaque impedit?'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'my work post.',
        //     'slug' => 'my-work-post',
        //     'excerpt' => 'Lorem, ipsum dolor.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, est maxime blanditiis dolorum aliquid officia reprehenderit? Illo molestias recusandae quo nobis enim minus doloribus ipsum, nisi non blanditiis itaque impedit?'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personel->id,
        //     'title' => 'My personem post.',
        //     'slug' => 'my-personem-post',
        //     'excerpt' => 'Lorem, ipsum dolor.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, est maxime blanditiis dolorum aliquid officia reprehenderit? Illo molestias recusandae quo nobis enim minus doloribus ipsum, nisi non blanditiis itaque impedit?'
        // ]);
    }
}
