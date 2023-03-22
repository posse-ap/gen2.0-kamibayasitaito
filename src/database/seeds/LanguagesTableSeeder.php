<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'HTML',
            'colour' => '#0445ec',
        ]);

        Language::create([
            'name' => 'CSS',
            'colour' => '#0f70bd',
        ]);

        Language::create([
            'name' => 'SQL',
            'colour' => '#20bdde',
        ]);

        Language::create([
            'name' => 'SHELL',
            'colour' => '#3ccefe',
        ]);

        Language::create([
            'name' => 'Javascript',
            'colour' => '#b29ef3',
        ]);

        Language::create([
            'name' => 'PHP',
            'colour' => '#4a17ef',
        ]);

        Language::create([
            'name' => 'PHP',
            'colour' => '#4a17ef',
        ]);

        Language::create([
            'name' => 'Laravel',
            'colour' => '#3005c0',
        ]);

        Language::create([
            'name' => 'その他',
            'colour' => '#6c46eb',
        ]);
    }
}
