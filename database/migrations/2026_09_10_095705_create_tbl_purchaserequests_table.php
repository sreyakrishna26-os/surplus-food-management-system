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
        Schema::create('tbl_purchaserequests', function (Blueprint $table) {
            $table->id('request_id');
            $table->unsignedBigInteger('buyer_id');
            $table->foreign('buyer_id')->references('buyer_id')->on('tbl_buyers')->onDelete('cascade');
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('food_id')->on('tbl_foods')->onDelete('cascade');
            $table->integer('request_quantity');
            $table->datetime('request_date');
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_purchaserequests');
    }
};
