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
        // Manually insert the default areas for projects
        DB::table('areas')->insert([
            'name' => 'Informática',
            'description' => 'Proyectos para los amantes de la programación',
        ]);
        DB::table('areas')->insert([
            'name' => 'Diseño gráfico',
            'description' => '¿Fan del diseño y de la creatividad? Ésta es tu área.',
        ]);
        DB::table('areas')->insert([
            'name' => 'Arquitectura',
            'description' => 'Aquí se encuentran los proyectos que transforman las ciudades.',
        ]);
        DB::table('areas')->insert([
            'name' => 'Comunicaciones',
            'description' => 'Si lo tuyo es la información y comunicar, has venido al área adecuada.',
        ]);
        DB::table('areas')->insert([
            'name' => 'Audiovisuales',
            'description' => 'Para los que disfrutan creando contenido multimedia.',
        ]);
        DB::table('areas')->insert([
            'name' => 'Empresariales',
            'description' => '¿Buscas proyectos de ámbito empresarial? No busques más, están aquí.',
        ]);

        factory(App\Project::class, 10)->create()->each(
            function ($project) {
                // Alternate areas between two cases: projects having 2 areas, or only one
                $boolean = random_int(0, 1);

                // This range is determined by all the areas inserted previously
                $ids = range(1,6);

                // Shuffle the IDs array to make it more "random"
                shuffle($ids);

                if ($boolean) {
                    // Slice the array taking only two elements
                    $sliced = array_slice($ids, 0, 2);

                    // Attach areas to project
                    $project->areas()->attach($sliced);
                } else {
                    // Attach only one area to the project
                    $project->areas()->attach(array_rand($ids, 1));
                }

                factory(App\Comment::class)->create(['user_id' => random_int(1, 10), 'project_id' => $project->id]);
                $progress_rand = rand(1,10);
                factory(App\Progress::class)->create(['user_id' => $progress_rand, 'project_id' => $progress_rand]);
            }
        );
    }
}
