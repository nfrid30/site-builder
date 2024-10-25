<?php

namespace App\Http\Resources\Api\Page;

use App\Models\Block;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Block
 */

class PageBlockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getKey(),
            'type' => $this->template->slug,
            'fields' => $this->fields,
            'blocks' => PageBlockResource::collection($this->showBlocks),
            'pages' => $this->whenNotNull($this->pages)
        ];
    }
}
