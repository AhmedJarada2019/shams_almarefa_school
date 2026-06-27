<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('national_identity')->nullable();
            $table->date('birthday')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('first_name');
                $table->dropColumn('last_name');
                $table->dropColumn('national_identity');
                $table->dropColumn('birthday');
            });
        });
    }
};
