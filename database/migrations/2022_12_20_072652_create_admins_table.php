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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('dob')->nullable();
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum("user_type",["admin","user"])->default('admin');
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
        Schema::dropIfExists('admins');
    }
};
