<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property Block|null showBlock
 */

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'show'
    ];
    public function blocks(): MorphMany
    {
        return $this->morphMany(Block::class, 'blockable')->orderBy('sort');
    }

    public function block(): MorphOne
    {
        return $this->blocks()->one()->ofMany();
    }
    public function showBlock(): MorphOne
    {
        return $this->showBlocks()->one()->ofMany();
    }
    public function showBlocks(): MorphMany
    {
        return $this->morphMany(Block::class, 'blockable')
            ->where('show', true)
            ->orderBy('sort');
    }
}
