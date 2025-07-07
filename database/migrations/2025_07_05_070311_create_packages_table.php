<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('packages', function (Blueprint $table) {
        $table->id();
        $table->string('package_name');
        $table->string('slug')->unique();
        $table->decimal('price', 10, 2);
        $table->text('short_description');
        $table->longText('description')->nullable();
        $table->text('amenities')->nullable();
        $table->text('reviews')->nullable();
        $table->json('subscriptions')->nullable(); // Store array of user IDs who bought
        $table->boolean('status')->default(1);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
