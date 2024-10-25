<?php

namespace App\Http\Requests\Setting;

use App\Http\Requests\Common\CommonHasBlockRequest;

class UpdateSettingRequest extends CommonHasBlockRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
            return array_merge(
                parent::rules(),[
                'name' => ['required', 'string', 'max:100'],
            ]);
    }
}
