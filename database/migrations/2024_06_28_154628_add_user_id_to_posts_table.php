<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id')->nullable();
 
            //$table->foreign('user_id')->references('id')->on('users');
            // this it will show error bcz of database puting 0 as the value i am not sure why 
            // to solve this i can delete this line and put nullable to user_id or make code to check if user id existed in users table 
        });
    }

    
};
