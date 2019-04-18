<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [];

        $rName = 'Admin';
        $roles[] = [
            'name' => $rName,
            'description' => 'An Admin role'
        ];
        $rName = 'Editor';
        $roles[] = [
            'name' => $rName,
            'description' => 'An Editor role'
        ];
        $rName = 'Writer';
        $roles[] = [
            'name' => $rName,
            'description' => 'An Writer role'
        ];
        $rName = 'Viewer';
        $roles[] = [
            'name' => $rName,
            'description' => 'An Viewer role'
        ];


        foreach ($roles as $data)
        {
            \DB::table('roles')->insert($data);

        }
    }
}
