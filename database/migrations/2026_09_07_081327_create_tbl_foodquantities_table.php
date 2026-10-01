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
        Schema::create('tbl_foodquantities', function (Blueprint $table) {
            $table->id('quantity_id');
            $table->foreignId('food_id')
            ->constrained('tbl_foods', 'food_id')
            ->cascadeOnDelete();

            $table->decimal('balquantity', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_foodquantities');
    }
};
