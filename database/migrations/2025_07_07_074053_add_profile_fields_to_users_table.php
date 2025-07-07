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
    Schema::table('users', function (Blueprint $table) {
        $table->string('address')->nullable()->after('email');   // or place it after any relevant column
        $table->string('phone')->nullable()->after('address');
        $table->string('zip_code')->nullable()->after('phone');
        $table->string('country')->nullable()->after('zip_code');
        $table->string('state')->nullable()->after('country');
        $table->string('city')->nullable()->after('state');
    });
}

    /**
     * Reverse the migrations.
     */
  public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['address', 'phone', 'zip_code', 'country', 'state', 'city']);
    });
}

};
