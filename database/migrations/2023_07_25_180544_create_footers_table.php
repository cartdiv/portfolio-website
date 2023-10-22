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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->String('phone_number')->nullable();
            $table->String('about_info')->nullable();
            $table->String('country')->nullable();
            $table->String('address')->nullable();
            $table->String('email')->nullable();
            $table->String('socal_info')->nullable();
            $table->String('facebook')->nullable();
            $table->String('twitter')->nullable();
            $table->String('linkedin')->nullable();
            $table->String('instagram')->nullable();
            $table->String('copyright')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
