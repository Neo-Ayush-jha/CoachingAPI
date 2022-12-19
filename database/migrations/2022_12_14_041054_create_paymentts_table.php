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
            $table->foreignId('course_id')->constrained()->nullable();
            $table->foreignId('user_id')->constrained()->nullable();
            $table->double('amount');
            $table->string('status');
            $table->string('payment_contact_number')->nullable();
            $table->string('entity')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('mode')->nullable();
            $table->string('wallet')->nullable();
            $table->string('txn_id')->nullable();
            $table->boolean('payment_status')->default(0);
            $table->integer('fee')->default(0);
            $table->date('dateOfPayment');
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
