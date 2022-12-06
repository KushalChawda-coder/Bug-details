<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bug_status;


class Bug_status_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
            $Bug_status= new Bug_status;
            $Bug_status->bug_status_name="Fixed";
            $Bug_status->save();
    }
}

