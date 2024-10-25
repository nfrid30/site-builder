<?php

namespace App\View\Components\Fields;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Button extends Component
{
    public Collection $pages;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $id,
        public string $name,
        public string $label,
        public string|array $value
    )
    {
        $this->pages = Page::query()->select('name', 'id')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.button');
    }
}
