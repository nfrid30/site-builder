<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\Common\CommonAuthorizedRequest;
use App\Models\Tag;
use Illuminate\Validation\Rule;


class StoreTagRequest extends CommonAuthorizedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string', 'max:100', Rule::unique(Tag::class, 'name')],
        ];
    }
}
