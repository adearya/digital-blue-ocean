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
            $table->foreignId('categories_id')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('item_types_id')->nullable();
            $table->foreignId('languages_id')->nullable();
            $table->foreignId('data_types_id')->nullable();
            $table->foreignId('refereeds_id')->nullable();
            $table->foreignId('statuses_id')->nullable();
            $table->foreignId('from_page')->nullable();
            $table->foreignId('to_page')->nullable();
            $table->string('title')->unique()->nullable();
            $table->string('abstract')->unique()->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('file_upload')->nullable();            
            $table->string('journal_or_publication_title')->nullable();
            $table->unsignedInteger('issn')->nullable();
            $table->string('publisher')->nullable();                
            $table->string('official_url')->nullable();
            $table->unsignedInteger('volume')->nullable();
            $table->unsignedInteger('number')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('month')->nullable();
            $table->unsignedInteger('day')->nullable();
            $table->string('email_depositor')->nullable();
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
