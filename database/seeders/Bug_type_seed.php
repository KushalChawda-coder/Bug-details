<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bug_type;


class Bug_type_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
       
            $Bug_type= new Bug_type;
            $Bug_type->bug_status_name="Fixed";
            $Bug_type->bug_category_name="High";
            $Bug_type->save();
    }
}

