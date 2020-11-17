<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'staff_id' => 'mu001',
            'name' => 'Mark Bright Baraka',
            'email' => 'mark@muni.ac.ug',
            'password' => Hash::make('helloworld'),
            'role' => 'HR',
            'status'=> '1',
        ]);
    }
}
