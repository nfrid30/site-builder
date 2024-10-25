<?php

namespace App\View\Components\Fields;


use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Tag extends Component
{

    public Collection $tags;
    /**
     * Create a new component instance.
     */
    public function __construct(public int $id,
                                public string $name,
                                public string $value)
    {
        $this->tags = \App\Models\Tag::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.tag');
    }
}
