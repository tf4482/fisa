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
        Schema::create('computers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->required()->unique();
            $table->string('status')->required();
            $table->ipAddress('ip')->unique();
            $table->string('ip_pub')->nullable();
            $table->integer('port')->nullable();
            $table->string('port_pub')->nullable();
            $table->string('mac')->unique()->nullable();
            $table->string('username')->nullable();
            $table->enum('type', [
                'minipc',
                'desktop',
                'laptop',
                'tablet',
                'virtualmachine',
                'clouddevice',
                'other',
            ])->nullable()->default('other');
            $table->string('avatar')->nullable();
            $table->integer('inspect')->nullable();
            $table->datetime('last_check')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
