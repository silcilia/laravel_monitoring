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
            $table->id();
            $table->string('name', 100);
            $table->string('location', 100);
            $table->float('threshold_voltage');
            $table->float('threshold_current');
            $table->string('status', 10)->default('ONLINE');
            $table->dateTime('last_seen')->nullable();
            $table->boolean('has_power_backup')->default(false);
            $table->string('wifi_ssid', 100)->nullable();
            $table->integer('wifi_config_count')->default(0);
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
