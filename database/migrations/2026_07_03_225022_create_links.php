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
            $table->unsignedBigInteger("user_id");
            $table->string("original_links");
            $table->string("new_links");
            $table->timestamps();
        });
        Schema::create('link_clicks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("owner_user");
            $table->string("link");
            $table->string('ip_address', 45)->nullable();
            $table->dateTime("transition_date");
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
