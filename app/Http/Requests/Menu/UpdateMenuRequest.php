<?php

namespace App\Http\Requests\Menu;


use App\Http\Requests\Common\CommonHasBlockRequest;

class UpdateMenuRequest extends CommonHasBlockRequest
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
