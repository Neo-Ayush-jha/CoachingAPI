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
        Schema::create('paymentts', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('bank_name');
            $table->string('mode');
            $table->string('txn_id');
            $table->boolean('status')->default(0);
            $table->date('dateOfPayment');
            $table->foreignId('course_id')->constrained()->nullable();
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
        Schema::dropIfExists('paymentts');
    }
};
