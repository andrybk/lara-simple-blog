<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UsersTableSeeder::class,
            BlogCategoriesTableSeeder::class,
            RolesTableSeeder::class,

        ]);
        factory(\App\Models\BlogPost::class, 100)->create();
        factory(\App\Models\User::class, 100)->create();

        // Get all the roles attaching up to 3 random roles to each user
        $roles = \App\Models\Role::all();

        // Populate the pivot table
        \App\Models\User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(rand(1, 4))->pluck('id')->toArray()
            );
        });

    }
}
