<?php

namespace App\Http\Services;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;

class MenuService
{

    public function getParsed(): Collection
    {
        return Menu::query()
            ->with('showBlock.template', 'showBlock.showBlocks.template')
            ->where('show', true)
            ->get();
    }
}
