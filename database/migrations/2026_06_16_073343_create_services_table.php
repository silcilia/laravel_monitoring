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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            // --- POTONGAN BARU DI BAWAH INI YANG DIMASUKKAN ---
            $table->string('name', 100);
            $table->string('url', 255);
            $table->string('service_type', 10);
            $table->string('last_status', 10)->default('UNKNOWN');
            $table->dateTime('last_checked')->nullable();
            $table->string('last_down_reason', 255)->nullable();
            $table->string('last_down_detail', 500)->nullable();
            $table->integer('last_status_code')->nullable();
            $table->float('last_response_time')->nullable();
            $table->dateTime('last_notified')->nullable();
            $table->integer('notification_cooldown_minutes')->default(30);
            $table->float('uptime_percentage')->default(100.0);
            // --------------------------------------------------
            $table->timestamps(); // bawaan aslinya tetap biarkan di bawah
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
