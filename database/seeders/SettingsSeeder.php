<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('settings')->insert([
            'title' => 'mooncart',
            'description' => 'mooncart',
            'keywords' => 'mooncart',
            'author' => 'mooncart',
            'email' => 'mooncart@example.com',
            'phone' => '145875657',
            'address' => 'Baku, Azerbaijan',
            'favicon' => '',
            'logo' => ''
        ]);
    }
}
