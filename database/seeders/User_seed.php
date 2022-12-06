<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class User_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $User= new User;
        $User->email="yatish@gmail.com";
        $User->password="12345";
        $User->user_status="1";
        $user->user_type="Tester"
        $User->name="kushal chawda";
        $User->save();
    }
}

