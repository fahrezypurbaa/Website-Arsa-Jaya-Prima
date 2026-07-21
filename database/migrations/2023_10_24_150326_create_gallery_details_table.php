<?php

use App\Models\PhotoCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gallery_details', function (Blueprint $table) {
            $table->id();
            $table->string('gallery_category_id');
            $table->foreign('gallery_category_id')->references('id')->on('gallery_categories')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('training');
            $table->string('schedule');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_details');
    }
};
