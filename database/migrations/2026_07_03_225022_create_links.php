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
        Schema::create('user_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->constrained()->cascadeOnDelete();
            $table->string("original_link");
            $table->string("short_code")->unique();
            $table->timestamps();
        });
        Schema::create('link_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_link_id")
                    ->constrained('user_links')
                    ->cascadeOnDelete();
            $table->ipAddress('ip_address');
            $table->text("user_agent")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
