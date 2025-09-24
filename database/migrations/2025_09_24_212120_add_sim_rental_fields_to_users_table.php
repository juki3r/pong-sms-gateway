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
        Schema::table('users', function (Blueprint $table) {
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('zip')->nullable();

            // Uploads
            $table->string('valid_id')->nullable();
            $table->string('selfie_id')->nullable();

            // Personal info
            $table->string('full_name')->nullable();
            $table->date('dob')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'barangay',
                'city',
                'province',
                'zip',
                'valid_id',
                'selfie_id',
                'full_name',
                'dob',
            ]);
        });
    }
};
