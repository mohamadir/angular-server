<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('comments')->truncate();
        DB::table('blogs')->truncate();
        DB::table('users')->truncate();
        factory(App\User::class, 10)->create();
        factory(App\Blog::class, 30)->create();
        factory(App\Comment::class, 300)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
