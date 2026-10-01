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
        Schema::create('tbl_payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('request_id')->on('tbl_purchaserequests')->onDelete('cascade');
            $table->decimal('total_amount', 8, 2);
            $table->date('payment_date');
            $table->string('payment_status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_payments');
    }
};
