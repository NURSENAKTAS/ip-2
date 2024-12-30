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
        Schema::create('role_forum', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('role_id');
            $table->UnsignedBigInteger('forum_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('forum_id')->references('id')->on('forums');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_forum');
    }
};
