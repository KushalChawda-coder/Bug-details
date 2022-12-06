<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bug;


class Bug_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $Bug= new Bug;
        $Bug->bug_title="image not open";
        $Bug->bug_image="High.jpg";
        $Bug->bug_description="jfhsd hiuhsdifhsd ihfiosdhoi";
        $Bug->bug_url="www.googl.com";
        $Bug->comment="this is demo comment";
        $Bug->bug_category="1";
        $Bug->assigned_to="1";
        $Bug->bug_status="1";
        $Bug->save();
    }
}
