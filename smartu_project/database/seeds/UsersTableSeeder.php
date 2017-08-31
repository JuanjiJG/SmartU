<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SmartU\User::class, 10)->create()->each(function ($u) {
            $u->projects()->save(factory(SmartU\Project::class)->make());
        });
    }
}
