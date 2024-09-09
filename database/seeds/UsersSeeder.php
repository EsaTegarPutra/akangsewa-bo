<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Administrator";
        $user->email = "admin@sewayuk.com";
        $user->password = bcrypt("admin123");
        $user->role_id = "1";
        $user->save();
    }
}
