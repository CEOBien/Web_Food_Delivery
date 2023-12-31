<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name'=> 'admin', 'display_name' => 'system management'],
            ['name'=> 'guest', 'display_name' => 'customer'],
            ['name'=> 'developer', 'display_name' => 'system developer'],
            ['name'=> 'content', 'display_name' => 'edit content']
        ]);
    }
}
