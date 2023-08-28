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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('progress_id')->constrained();
            $table->char('no_pirt',16)->nullable();
            $table->char('no_sertifikat_halal', 14);
            $table->string('vendor');
            $table->boolean('is_in_warehouse');
            $table->double('unit_price', 12, 2);
            $table->integer('unit_in_stock');
            $table->double('unit_weight', 8, 2);
            $table->char('bpom_no',16)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
