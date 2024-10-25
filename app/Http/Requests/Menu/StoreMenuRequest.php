<?php

namespace App\Http\Requests\Menu;

use App\Http\Requests\Common\CommonAuthorizedRequest;

class StoreMenuRequest extends CommonAuthorizedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
        ];
    }
}
