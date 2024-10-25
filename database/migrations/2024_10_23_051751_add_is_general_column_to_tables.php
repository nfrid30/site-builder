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
        Schema::table('blocks', function (Blueprint $table) {
            $table->boolean('is_general')->default(false);
        });

        Schema::table('templates', function (Blueprint $table) {
            $table->boolean('is_general')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blocks', function (Blueprint $table) {
            $table->dropColumn('is_general');
        });
        Schema::table('templates', function (Blueprint $table) {
            $table->dropColumn('is_general');
        });
    }
};
