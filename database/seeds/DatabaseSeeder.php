<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents('/home/radik/projects/makedeal/itprof.sql'));
        DB::unprepared(file_get_contents('/home/radik/projects/makedeal/techlist.sql'));

        factory(App\User::class, 50)->create();
        factory(App\Project::class, 50)->create();
        factory(App\Admin::class, 5)->create();
        factory(App\Company::class, 50)->create();

        factory(App\Contact::class, 50)->create();
//        factory(App\Photo::class, 50)->create();
//        factory(App\Comment::class, 50)->create();


        $faker = Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('photos')->insert([
                'user_id' => $i,
                'link' => $faker->url,
            ]);
        }

        for ($i = 1; $i <= 50; $i++) {
            DB::table('comments')->insert([
                'user_id' => $i,
                'title' => $faker->bs,
                'text' => $faker->realText($maxNbChars = 191, $indexSize = 2),
            ]);
        }

        for ($i = 1; $i <= 50; $i++) {
            DB::table('project_user')->insert([
                'project_id' => $faker->numberBetween(1, 50),
                'user_id' => $i
            ]);
        }

        for ($i = 1; $i <= 50; $i++) {
            DB::table('technology_user')->insert([
                'technology_id' => $faker->numberBetween(1, 196),
                'user_id' => $i,

            ]);
        }

        for ($i = 1; $i <= 50; $i++) {
            DB::table('company_user')->insert([
                'user_id' => $i,
                'company_id' => $faker->numberBetween(1, 50)

            ]);
        }

        for ($i = 1; $i <= 50; $i++) {
            DB::table('project_technology')->insert([
                'project_id' => $i,
                'technology_id' => $faker->numberBetween(1, 196)
            ]);
        }
    }
}