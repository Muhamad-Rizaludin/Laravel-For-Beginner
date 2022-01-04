<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EdulevesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);**/
        DB::table('edulevels')->insert([
            [
                'name' => 'SD Sederajat',
                'desc' => 'SD / MI',
            ],
            [
                'name' => 'SMP Sederajat',
                'desc' => 'SMP / MTS',
            ]
        ]);
    }
}
