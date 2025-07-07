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
       Schema::create('reviews', function (Blueprint $table) {
    $table->id();
    $table->foreignId('package_id')->constrained()->onDelete('cascade');
    $table->string('name')->nullable();
    $table->string('user_id')->nullable();
    $table->text('comment')->nullable();
    $table->tinyInteger('rating')->nullable(); // 1 to 5
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
