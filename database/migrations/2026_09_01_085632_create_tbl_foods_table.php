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
        Schema::create('tbl_foods', function (Blueprint $table) {
            $table->id('food_id');
            $table->string('food_name');
            $table->string('food_type');
            $table->integer('food_quantity');
            $table->decimal('food_price', 8, 2);
            $table->decimal('food_offerprice', 8, 2);
            $table->string('food_image');
            $table->date('food_expiry_date');
            $table->date('food_regdate');
              $table->unsignedBigInteger('donor_id');
    $table->unsignedBigInteger('sid');

    $table->string('status')->default('Pending');

    $table->foreign('donor_id')
        ->references('donor_id')
        ->on('tbl_donors')
        ->onDelete('cascade');

    $table->foreign('sid')
        ->references('sid')
        ->on('subcategories')
        ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_foods');
    }
};
