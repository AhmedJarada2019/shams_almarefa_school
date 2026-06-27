<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('mobile')->unique()->nullable();
            $table->integer('verification_code')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->foreignId('country_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name','email','mobile','verification_code','is_verified','country_id']);
        });
    }
};
