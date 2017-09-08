<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(
            function($user) {
                factory(App\Project::class)->create(['user_id' => $user->id]);
                factory(App\Comment::class)->create(['user_id' => rand(1, 10), 'project_id' => rand(1,10)]);
            }
        );
    }
}
