<?php

namespace App\Observers;

use App\Enums\EventActionEnum;
use App\Models\Event;
use App\Models\Tag;

class TagObserver
{
    public function created(Tag $tag): void
    {
        Event::query()->create([
            'entity' => 'Tag',
            'action' => EventActionEnum::CREATE->value,
            'user_id' => auth()->id(),
            'new_values' => $tag->toArray(),
            'link' => route('admin.tags.edit', $tag)
        ]);
    }

    public function updated(Tag $tag): void
    {
        Event::query()->create([
            'entity' => 'Tag',
            'action' => EventActionEnum::UPDATE->value,
            'user_id' => auth()->id(),
            'old_values' => $tag->getOriginal(),
            'new_values' => $tag->toArray(),
            'link' => route('admin.tags.edit', $tag)
        ]);
    }

    public function deleted(Tag $tag): void
    {
        Event::query()->create([
            'entity' => 'Tag',
            'action' => EventActionEnum::DELETE->value,
            'user_id' => auth()->id(),
            'old_values' => $tag->getOriginal(),
        ]);
    }

}
