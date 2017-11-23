<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Posts;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Posts::class, 100)->create();
    }
}
