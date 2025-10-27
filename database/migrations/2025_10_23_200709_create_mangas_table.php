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
    Schema::create('mangas', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->integer('number')->nullable();
        $table->integer('year')->nullable();
        $table->string('category')->nullable();
        $table->text('description')->nullable();
        $table->string('image_path')->nullable();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mangas');
    }
};
