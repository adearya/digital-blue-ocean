<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  // Run the migrations.
  public function up(): void {
    Schema::create('publishes', function (Blueprint $table) {
      $table->id();
      $table->foreignId('item_types_id')->default(1);
      $table->foreignId('languages_id')->default(1);
      $table->string('title')->unique();
      $table->string('slug')->unique();
      $table->text('abstract')->unique();
      $table->foreignId('refereeds_id')->default(1);
      $table->foreignId('statuses_id')->default(1);
      $table->string('journal_or_publication_title');
      $table->string('issn');
      $table->string('publisher');
      $table->string('official_url');
      $table->unsignedBigInteger('volume');
      $table->unsignedBigInteger('number');
      $table->unsignedInteger('from_page');
      $table->unsignedInteger('to_page');
      $table->unsignedInteger('year');
      $table->string('month');
      $table->unsignedInteger('day');
      $table->foreignId('data_types_id')->default(1);
      $table->string('email_depositor')->nullable();
      $table->string('reference')->nullable();
      $table->foreignId('categories_id')->default(1);
      $table->string('file_upload')->nullable();
      $table->string('link_file_upload')->nullable();
      $table->string('image')->nullable();
      $table->string('link_image')->nullable();
      $table->unsignedBigInteger('views_count')->default(0);
      $table->unsignedBigInteger('download_count')->default(0);
      $table->timestamp('published_at')->nullable();      
      $table->timestamps();
    });
  }

  // Reverse the migrations.
  public function down(): void {
    Schema::dropIfExists('publishes');
  }
};
