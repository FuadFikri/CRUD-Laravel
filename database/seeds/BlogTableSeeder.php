<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1, 10) as $loop) {
            DB::table('blog')->insert([
                'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'subject' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'slug' => str_slug($faker->sentence($nbWords = 3, $variableNbWords = true), '-'),
            ]);
            }
    }
}
