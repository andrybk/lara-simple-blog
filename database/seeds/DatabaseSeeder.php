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

        ]);
        factory(\App\Models\BlogPost::class, 100)->create();

    }
}
