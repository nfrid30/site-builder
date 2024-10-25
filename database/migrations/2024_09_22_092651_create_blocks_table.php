<?php

use App\Models\Block;
use App\Models\Template;
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
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->json('fields')->nullable();
            $table->foreignIdFor(Template::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Block::class)->nullable()->constrained()->cascadeOnDelete();
            $table->morphs('blockable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocks');
    }
};
