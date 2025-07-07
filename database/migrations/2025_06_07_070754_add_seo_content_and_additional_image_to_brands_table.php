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
        Schema::table('brands', function (Blueprint $table) {
            $table->text('seo_content')->nullable()->after('description');
            $table->string('additional_image')->nullable()->after('icon_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('seo_content');
            $table->dropColumn('additional_image');
        });
    }
};
