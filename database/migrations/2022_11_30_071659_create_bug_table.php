<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bug', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bug_title');
            $table->string('bug_image');
            $table->string('bug_description');
            $table->string('bug_url');
            $table->string('comment');
            $table->integer('bug_category')->unsigned();
            $table->integer('assigned_to')->unsigned();
            $table->integer('bug_status')->unsigned();

            $table->foreign('bug_status')->references('bug_status_id')->on('bug_status');
            $table->foreign('bug_category')->references('bug_type_id')->on('bug_type');
             $table->foreign('assigned_to')->references('uid')->on('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bug');
    }
};
