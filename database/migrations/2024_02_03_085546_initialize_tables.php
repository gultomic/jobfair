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
        Schema::create('configs', function (Blueprint $table) {
            $table->string('identity')->unique();
            $table->json('body');
            $table->index([
                'identity'
            ]);
        });

        Schema::create('jobfair', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->longText('deskripsi')->nullable();
            $table->json('refs')->nullable();
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('jobfair_id')->constrained('jobfair')->cascadeOnDelete();
            $table->date('tanggal');
            $table->json('refs')->nullable();
            $table->timestamps();
        });

        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('event_id')->constrained('events')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('configs');
        Schema::dropIfExists('jobfair');
        Schema::dropIfExists('events');
        Schema::dropIfExists('kehadiran');
        Schema::enableForeignKeyConstraints();
    }
};
