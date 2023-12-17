<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbecedarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('abecedarios')->insert([
            'letra' => 'a'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'b'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'ch'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => "ch'"
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'e'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'g'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'h'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'i'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'j'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'k'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => "k'"
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'l'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'm'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'n'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'o'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'p'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => "p'"
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'r'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 's'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 't'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => "t'"
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'ts'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => "ts'"
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'u'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'w'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'x'
        ]);
        DB::table('abecedarios')->insert([
            'letra' => 'y'
        ]);
    }
}
