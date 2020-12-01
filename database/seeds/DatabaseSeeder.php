<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(LoaiTableSeeder::class);
       $this->call(ThanhToanTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
