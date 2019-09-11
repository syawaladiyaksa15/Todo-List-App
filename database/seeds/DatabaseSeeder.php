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
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class,2)->create();
        factory(App\board::class,2)->create();
        factory(App\done::class,2)->create();
        factory(App\doo::class,3)->create();
        factory(App\todo::class,3)->create();
    }
}
