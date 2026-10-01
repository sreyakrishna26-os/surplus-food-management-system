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
        Schema::create('tbl_donors', function (Blueprint $table) {
            $table->id('donor_id');
            $table->unsignedBigInteger('login_id');
            $table->foreign('login_id')
                    ->references('login_id')
                    ->on('tbl_logins')
                    ->onDelete('cascade');
            $table->string('donor_name');
            $table->string('donor_email')->unique();
            $table->string('donor_phone');
            $table->string('donor_address');
            $table->string('id_proof');
            $table->date('reg_date');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                    ->references('location_id')
                    ->on('tbl_locations')
                    ->onDelete('cascade');  
            $table->string('license_number');
            $table->string('status');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_donors');
    }
};
