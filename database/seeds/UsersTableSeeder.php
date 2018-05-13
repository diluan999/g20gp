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
        DB::table('users')->truncate();
        App\User::create([
        	'name' => 'G2GP',
        	'email' =>'cnpmnc@gmail.com',
        	'password' => bcrypt('AdminCnPmNcG20Gp')
        ]);
        App\User::create([
        	'name' => 'CNPMNC',
        	'email' =>'cnpmncgp@gmail.com',
        	'password' => bcrypt('123456')
        ]);
    }
}
