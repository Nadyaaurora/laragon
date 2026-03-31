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
        Schema::table('posts', function (Blueprint $table) {
            //
        if (!Schema::hasColumn('posts', 'color')) $table->string('color')->nullable();
        if (!Schema::hasColumn('posts', 'image')) $table->string('image')->nullable();
        if (!Schema::hasColumn('posts', 'tags')) $table->json('tags')->nullable();
        if (!Schema::hasColumn('posts', 'published')) $table->boolean('published')->default(false);
        if (!Schema::hasColumn('posts', 'published_at')) $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
