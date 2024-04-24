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
        Schema::create('devices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('model');
            $table->string('device_type')->enum(
                'device_type', [
                    'minipc',
                    'desktop',
                    'laptop',
                    'tablet',
                    'smartphone',
                    'smartwatch',
                    'other',
                ])->required()->default('other');
            $table->macAddress('mac_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
