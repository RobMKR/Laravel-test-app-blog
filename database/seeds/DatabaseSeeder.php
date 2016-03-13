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
      DB::table('users')->insert([
          'name' => 'Admin',
          'email' => 'admin@example.com',
          'password' => bcrypt('admin'),
          'is_admin' => 1,
          'created_at' => date('Y-m-d h:i:s')

      ]);
    }
}
