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
        Schema::create('sittings', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->text('facebook');
            $table->text('instegram');
            $table->text('twitter');
            $table->text('youtube');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sittings');
    }
};
