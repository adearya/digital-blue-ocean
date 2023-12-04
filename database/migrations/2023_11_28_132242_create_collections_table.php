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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('item_type_id')->nullable();
            $table->foreignId('language_id')->nullable();
            $table->foreignId('data_type_id')->nullable();
            $table->foreignId('status_id')->nullable();
            $table->foreignId('page_range_id')->nullable();
            $table->string('title')->unique();
            $table->string('abstract')->unique()->nullable();
            $table->string('slug')->unique();
            $table->string('file_upload')->nullable();
            $table->boolean('refereed')->nullable();
            $table->string('publication_title')->nullable();
            $table->unsignedInteger('issn')->nullable();
            $table->string('publisher')->nullable();
            // table cover not availabel
            // table author company not availabel
            $table->string('official_url')->nullable();
            $table->unsignedInteger('volume')->nullable();
            $table->unsignedInteger('number')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->string('reference')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->unsignedInteger('views_count')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
