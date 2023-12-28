<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  // Run the migrations.     
  public function up(): void {
    Schema::create('authors', function (Blueprint $table) {
      $table->id();
      $table->string('firstName');
      $table->string('lastName');
      $table->string('email');
      $table->string('authorCompany');
      $table->unsignedBigInteger('download_count')->default(0);
      $table->timestamps();
    });
  }

  // Reverse the migrations.
  public function down(): void {
    Schema::dropIfExists('authors');
  }
};
