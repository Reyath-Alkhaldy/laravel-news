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
        // Schema::create('post_translations', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete();
            // $table->string('locale')->index();
            // $table->string('title')->nullable();
            // $table->text('content')->nullable();
            // $table->text('small_desc')->nullable();
            // $table->unique(['post_id','locale']);
            // $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('post_translations');
    }
};
