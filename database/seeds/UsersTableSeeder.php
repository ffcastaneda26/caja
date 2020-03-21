<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**UsersTableSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('users')->insert([
           'name' => 'Federico Castañeda Ortiz',
           'email' => 'ffcastaneda@gmail.com',
           'email_verified_at' => now(),
           'password' => bcrypt('mxpxtxlx'), // password
           'remember_token' => Str::random(10),
         ]);

         //factory(User::class,10)->create();
    }
}
