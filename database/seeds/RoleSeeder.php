<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                
                'role' => 'hr',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                
                'role' => 'hod',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                
                'role' => 'dean',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                
                'role' => 'us',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                
                'role' => 'vc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
