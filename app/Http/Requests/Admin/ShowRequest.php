<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Common\CommonAuthorizedRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends CommonAuthorizedRequest
{
    public const SHOW_MODELS = [
        'Page',
        'Block',
        'Menu'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'int'],
            'model' => ['required', Rule::in(self::SHOW_MODELS)],
        ];
    }
}
