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
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_type_id')->constrained();
            $table->foreignId('bank_account_id')->constrained();
            $table->foreignId('user_balance_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('transaction_no');
            $table->string('status_transaction');
            $table->dateTime('date_time', $precision = 0);
            $table->double('amount', 12, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_histories');
    }
};
