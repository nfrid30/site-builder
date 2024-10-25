<?php

namespace App\Http\Requests\Tag;

use App\Models\Tag;
use Illuminate\Validation\Rule;

trait TagValidationTrait
{
    public function tagRules(): array
    {
        return [
            'tags' => [ 'array'],
            'tags.*' => ['int', Rule::exists(Tag::class, 'id')],
        ];

    }
}
