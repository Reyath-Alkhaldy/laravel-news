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
        Schema::create('rss_feeds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('link')->unique();
            $table->string('image_url', 800)->nullable();
            $table->text('description')->nullable();
            $table->text('source')->nullable();
            // $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();

            // $table->dateTime('publication_date')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rss_feeds');
    }
};
