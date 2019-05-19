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
    	 for ($i=0; $i < 1000; $i++) {

         DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'first_name' =>   Str::random(10),
            'last_name' =>  Str::random(10),
             'user_img' => 'dummy-image.jpg',
            'phone_no' => Str::random(10),
               'created_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s'),
        ]);
     }
    }
}
