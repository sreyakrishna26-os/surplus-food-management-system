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
        Schema::create('tbl_locations', function (Blueprint $table) {
            $table->id('location_id');
            $table->string('location_name');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('district_id')->on('tbl_districts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_locations');
    }
};
