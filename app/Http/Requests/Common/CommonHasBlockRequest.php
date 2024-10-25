<?php

namespace App\Http\Requests\Common;

use App\Models\Block;
use Illuminate\Validation\Rule;

class CommonHasBlockRequest extends CommonAuthorizedRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'blocks' => ['array'],
            'blocks.*.id' => ['int', Rule::exists(Block::class, 'id')],
            'blocks.*.fields' => ['array'],
        ];
    }
}
