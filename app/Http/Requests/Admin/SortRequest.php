<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Common\CommonAuthorizedRequest;
use Illuminate\Validation\Rule;

class SortRequest extends CommonAuthorizedRequest
{
    public const SORT_MODELS = [
        'Block'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'sort' => ['required', 'array'],
            'model' => ['required', Rule::in(self::SORT_MODELS)],
        ];
    }
}
