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
       Schema::create('access_controls', function (Blueprint $table) {
    $table->id();
    $table->string('type'); // "country" or "ip"
    $table->string('value'); // country code (IN, US) or IP address (123.45.67.89)
    $table->boolean('is_allowed')->default(true); // allow or block
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_controls');
    }
};
