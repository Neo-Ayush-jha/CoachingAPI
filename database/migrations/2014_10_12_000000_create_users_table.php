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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('dob');
            $table->string('name');
            $table->string('gender');
            $table->string('address');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum("status",["1","2","0"])->default(0);
            $table->enum("user_type",["admin","user"])->default('user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
