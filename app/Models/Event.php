<?php

namespace App\Models;

use App\Enums\EventActionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity',
        'user_id',
        'action',
        'old_values',
        'new_values',
        'link'
    ];

    public function casts(): array
    {
        return [
            'old_values' => 'array',
            'new_values' => 'array',
            'action' => EventActionEnum::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
