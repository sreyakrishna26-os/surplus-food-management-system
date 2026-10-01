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
        Schema::create('tbl_buyers', function (Blueprint $table) {
            $table->id('buyer_id');
            $table->string('buyer_name');
            $table->string('buyer_email')->unique();
            $table->string('buyer_type');
            $table->string('buyer_phone');
            $table->string('buyer_address');
            $table->string('buyer_status')->default('Active');
            $table->date('registration_date');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('location_id')->on('tbl_locations');
            $table->unsignedBigInteger('login_id');
            $table->foreign('login_id')->references('login_id')->on('tbl_logins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_buyers');
    }
};
