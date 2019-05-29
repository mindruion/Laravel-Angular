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
        $this->call(UsersTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(TeamMembersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(TechnologySeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
