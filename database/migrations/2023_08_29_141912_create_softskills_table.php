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
        Schema::create('softskills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slugSoftskill')->unique();
            $table->string('email');
            $table->string('phone');
            $table->text('company')->nullable(true);
            $table->text('company_address')->nullable(true);
            $table->foreignId('training_id')->nullable()->constrained();
            $table->enum('progress', ['Belum', 'Sudah'])->default('Belum');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('softskills');
    }
};
