<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Content::create([
            'name' => 'N予備校',
            'colour' => '#0445ec',
        ]);

        Content::create([
            'name' => '課題',
            'colour' => '#0f70bd',
        ]);

        Content::create([
            'name' => 'ドットインストール',
            'colour' => '#20bdde',
        ]);
    }
}
