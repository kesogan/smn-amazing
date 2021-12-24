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
        $this->call(RolePermissionSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ArtTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(CartTableSeeder::class);
        $this->call(EquipmentTableSeeder::class);
        $this->call(SupportTableSeeder::class);
        $this->call(TechniqueTableSeeder::class);
    }
}
