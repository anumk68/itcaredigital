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
        Schema::table('settings_page', function (Blueprint $table) {
            $table->text('faq_schema')->nullable()->change();
            $table->text('extra_schema')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings_page', function (Blueprint $table) {
            $table->string('faq_schema')->nullable()->change();
            $table->string('extra_schema')->nullable()->change();
        });
    }
};
