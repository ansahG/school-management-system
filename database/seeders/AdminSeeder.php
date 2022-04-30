<?php

namespace Database\Seeders;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
        [
            'id' => 1,
          'name'=> 'Gideon K',
         'email' => 'admin@admin.com',
         'password' => Hash::make('password'),
          '_department' => 'Administrator',
          'email_verified_at' => null,
          'current_team_id' => null,
          'profile_photo_path' => ' ',
          '_dateStarting' => null,
          '_phone' => null,
          '_ghanaCard' => null,
          '_dateOfBirth' => null,
          'email_verified_at' => null,
          '_salary' => null,
          '_trash' => 'false',
        ],

        [
                   'id' => 2,
          'name'=> 'Gideon K',
         'email' => 'teacher@teacher.com',
         'password' => Hash::make('password'),
          '_department' => 'Teacher',
           'email_verified_at' => null,
          'current_team_id' => null,
          'profile_photo_path' => ' ',
          '_dateStarting' => null,
          '_phone' => null,
          '_ghanaCard' => null,
          '_dateOfBirth' => null,
          'email_verified_at' => null,
          '_salary' => null,
          '_trash' => 'false',
        ],

         [
                   'id' => 3,
          'name'=> 'Gideon K',
         'email' => 'accountant@accountant.com',
         'password' => Hash::make('password'),
          '_department' => 'Accountant',
           'email_verified_at' => null,
          'current_team_id' => null,
          'profile_photo_path' => ' ',
          '_dateStarting' => null,
          '_phone' => null,
          '_ghanaCard' => null,
          '_dateOfBirth' => null,
          'email_verified_at' => null,
          '_salary' => null,
          '_trash' => 'false',
        ],

    
       ]);
    }
}
