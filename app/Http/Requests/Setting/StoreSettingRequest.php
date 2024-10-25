<?php

namespace App\Http\Requests\Setting;

use App\Http\Requests\Common\CommonAuthorizedRequest;

class StoreSettingRequest extends CommonAuthorizedRequest
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
