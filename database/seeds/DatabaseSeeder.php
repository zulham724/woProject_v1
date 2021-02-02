<?php

use Illuminate\Database\Seeder;
use App\role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // role::create([
        // 	"id"=>1,
        // 	"content"=>"admin"
        // 	]);
        // role::create([
        // 	"id"=>2,
        // 	"content"=>"operator"
        // 	]);
        //   role::create([
        //     "id"=>3,
        //     "content"=>"staff"
        //   ]);
          User::create([
              'name' => "Admin",
              'email' => "admin@gmail.com",
              'password' => bcrypt("admin"),
              'role_id'=> 1
          ]);

    }
}
