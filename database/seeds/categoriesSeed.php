<?php

use Illuminate\Database\Seeder;

class categoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('user_roles')->delete();
        \Illuminate\Support\Facades\DB::table('user_roles')->insert(
           [ ['role' => 'admin'],
            ['role' => 'user']]
        );
        \Illuminate\Support\Facades\DB::table('user_statuses')->delete();
        \Illuminate\Support\Facades\DB::table('user_statuses')->insert(
            [['status' => 'Not Approved'],
            ['status' => 'Approved']]
        );
    }
}
