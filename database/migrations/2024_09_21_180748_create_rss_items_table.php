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
        Schema::create('rss_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('link');
            $table->text('content')->nullable();
            $table->text('description')->nullable();
            $table->string('image_url', 800)->nullable(); 
            $table->string('video_url', 800)->nullable(); 
            $table->dateTime('pub_date')->nullable(); 
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('rss_feed_id')->constrained('rss_feeds')->cascadeOnDelete();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rss_items');
    }
};
