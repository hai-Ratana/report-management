<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'user' => 'Ratana',
          'firstname' => 'Ratana',
          'lastname' => 'Hai',
          'email' => 'hairatana@gmail.com',
          'role' => 1,
          'login_date' => date('Y-m-d H:i:s'),
          'password' => bcrypt('1234'),
      ]);
      DB::table('wrm-tbl-projects')->insert([
          'nameProject' => 'report management system',
          'description' => 'for actvity working',
          'duration' => '3 week',
          'other' => 'null',

          ]);
    }
}
