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
      Schema::create('customer_inquiries', function (Blueprint $table) {
    $table->id();
    $table->string('brand')->nullabe();
    $table->string('model_number')->nullabe();
    $table->string('name')->nullabe();
    $table->string('email')->nullabe();
    $table->string('country_code')->nullabe();
    $table->string('phone_number')->nullabe();
    $table->text('issue_description')->nullabe();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_inquiries');
    }
};
