<?php

namespace App\Http\Resources\Api\Menu;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Menu
 */

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $blocks = [];
        if(count($this->showBlock->showBlocks)) {
            $blocks = [
                'blocks' => MenuBlockResource::collection($this->showBlock->showBlocks)
            ];
        }

        return [
            'id' => $this->getKey(),
            'fields' => $this->showBlock->fields,
            'type' => $this->showBlock->template->slug,

        ] + $blocks;
    }
}
