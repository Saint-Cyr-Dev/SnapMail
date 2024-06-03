<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'message' => 'Ceci est un message de test.',
                'photo' => null,
                'token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'message' => 'Voici un autre message de test.',
                'photo' => null,
                'token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'message' => 'Un troisième message pour tester.',
                'photo' => null,
                'token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
