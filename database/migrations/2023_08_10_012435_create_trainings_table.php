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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_categories_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->text('description');
            $table->text('outline');
            $table->text('requirement')->nullable();
            $table->text('method')->nullable();
            $table->text('facility');
            $table->text('pricelist')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('keywords')->nullable();
            $table->text('excerpt');
            // $table->dateTime('deleted_at')->nullable();
            // $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
