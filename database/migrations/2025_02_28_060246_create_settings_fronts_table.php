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
        Schema::create('settings_fronts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default('text');
            $table->string('image_header')->nullable();
            $table->string('image_footer')->nullable();
            $table->string('width');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings_fronts');
    }
};
