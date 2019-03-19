<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'name' => 'Librarian',
            'slug' => 'librarian'
        ]);

        DB::table('role')->insert([
            'name' => 'Student',
            'slug' => 'student'
        ]);
    }
}
