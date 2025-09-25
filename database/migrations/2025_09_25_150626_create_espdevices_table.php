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
        Schema::create('espdevices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();          // e.g., esp32-sim-001
            $table->string('firmware_version')->default('1.0.0');
            $table->string('ota_key');                 // unique key per device
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espdevices');
    }
};
