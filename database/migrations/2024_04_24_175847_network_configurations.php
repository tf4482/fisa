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
        Schema::create('network_configurations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->ipAddress('ip_address')->nullable();
            $table->string('sshport')->default('22')->nullable();
            $table->ForeignUuid('host_id')->constrained();
            $table->boolean('pingcheck')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('network_configurations');
    }
};
