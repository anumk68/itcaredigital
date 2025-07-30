<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
        });
    }

    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_description', 'meta_keyword']);
        });
    }
};
