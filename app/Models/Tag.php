<?php

namespace App\Models;

use App\Observers\TagObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

#[ObservedBy([TagObserver::class])]
class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function pages(): MorphToMany
    {
        return $this->morphedByMany(Page::class, 'taggable');
    }

}
