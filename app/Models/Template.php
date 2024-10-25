<?php

namespace App\Models;

use App\Enums\TemplateTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string name
 * @property string slug
 * @property string cover
 * @property array|null options
 * @property int template_id
 * @property bool is_general
 *
 * @property Template template
 * @property Block|null generalBlock
 * /
 */


class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'slug',
        'cover',
        'options',
        'template_id',
        'is_general'
    ];

    public function casts(): array
    {
        return [
            'type' => TemplateTypeEnum::class,
            'options' => 'array',
            'is_general' => 'boolean'
        ];
    }

    public function template(): HasOne
    {
        return $this->hasOne(Template::class);
    }

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class);
    }

    public function generalBlock(): HasOne
    {
        return $this->blocks()->one()->ofMany([], function (Builder $query){
            $query->where('is_general', true);
        });
    }
}
