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
            $table->string('faq_schema')->nullable();
            $table->string('extra_schema')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings_page', function (Blueprint $table) {
            $table->dropColumn(['faq_schema', 'extra_schema']);
        });
    }
};
