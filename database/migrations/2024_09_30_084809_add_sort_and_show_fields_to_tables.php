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
        Schema::table('pages', function (Blueprint $table) {
            $this->fields($table);
        });

        Schema::table('blocks', function (Blueprint $table) {
            $this->fields($table);
        });

        Schema::table('templates', function (Blueprint $table) {
            $this->fields($table);
        });

        Schema::table('tags', function (Blueprint $table) {
            $this->fields($table);
        });
    }

    public function fields(Blueprint $table): void
    {
        $table->boolean('show')->default(false);
        $table->integer('sort')->default(1);
    }

    public function removeFields(Blueprint $table): void
    {
        $table->dropColumn('show');
        $table->dropColumn('sort');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $this->removeFields($table);
        });

        Schema::table('blocks', function (Blueprint $table) {
            $this->removeFields($table);
        });

        Schema::table('templates', function (Blueprint $table) {
            $this->removeFields($table);
        });

        Schema::table('tags', function (Blueprint $table) {
            $this->removeFields($table);
        });
    }
};
