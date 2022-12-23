<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{Bug,Bug_type,User,Bug_status};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
     $users = array(
              array('uid' => '1','name' => 'Yatish','email' => 'yatish@gmail.com','email_verified_at' => NULL,'user_status' => '1','user_type' => 'Tester','password' => '$2y$10$rnzKZQpuCUfy8Q8IQKFSie.ib2GAw1ggc0xw9bWSJlgnkK28Z697S','remember_token' => NULL,'created_at' => '2022-12-19 13:45:05','updated_at' => '2022-12-19 13:45:05'),
              array('uid' => '2','name' => 'kushal','email' => 'kushal@gmail.com','email_verified_at' => NULL,'user_status' => '1','user_type' => 'Developer','password' => '$2y$10$YrYaQvhIZLzrZIMHbGwPP.FTTVMRHLdFC/iTFqKQaKdJZQvz/8Oj6','remember_token' => NULL,'created_at' => '2022-12-21 06:15:20','updated_at' => '2022-12-21 06:15:20')
                    );
     User::insert($users);

     $bug_type = array(
          array('bug_type_id' => '1','bug_category_name' => 'High','created_at' => '2022-11-30 09:57:16','updated_at' => '2022-11-30 09:57:16'),
          array('bug_type_id' => '2','bug_category_name' => 'Low','created_at' => '2022-11-30 09:57:16','updated_at' => '2022-11-30 09:57:16'),
          array('bug_type_id' => '3','bug_category_name' => 'Medium','created_at' => '2022-11-30 09:57:16','updated_at' => '2022-11-30 09:57:16')
        );
      Bug_type::insert($bug_type);

    
      $bug_status = array(
          array('bug_status_id' => '1','bug_status_name' => 'Open','created_at' => NULL,'updated_at' => NULL),
          array('bug_status_id' => '2','bug_status_name' => 'Fixed','created_at' => NULL,'updated_at' => NULL),
          array('bug_status_id' => '3','bug_status_name' => 'Close','created_at' => NULL,'updated_at' => NULL)
        );
       Bug_status::insert($bug_status);

    $bug = array(
          array('id' => '4','bug_title' => 'Ui is not working','bug_image' => '/storage/images/1669979184.JPG','bug_description' => 'when i click second time ui is not working proper','bug_url' => 'http://www.google.com','bug_category' => '3','assigned_to' => '2','comment' => 'this will be update by user','bug_status' => '1','created_at' => '2022-11-30 13:59:40','updated_at' => '2022-11-30 13:59:40'),
          array('id' => '7','bug_title' => 'image upload','bug_image' => '/storage/images/1669979222.JPG','bug_description' => 'image upload not working','bug_url' => 'http://localhost:8000/create','bug_category' => '3','assigned_to' => '2','comment' => 'this is secondd demo','bug_status' => '2','created_at' => '2022-12-01 06:53:09','updated_at' => '2022-12-01 06:53:09'),
          array('id' => '9','bug_title' => 'text','bug_image' => '/storage/images/1669979208.JPG','bug_description' => 'format speling is not correct','bug_url' => 'http://www.google.com','bug_category' => '3','assigned_to' => '2','comment' => 'needs to be fixed','bug_status' => '3','created_at' => '2022-12-01 13:52:31','updated_at' => '2022-12-01 13:52:31')
        );
     Bug::insert($bug);
    }

}
