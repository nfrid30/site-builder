<?php

namespace App\Http\Requests\Block;

use App\Http\Requests\Common\CommonAuthorizedRequest;

class AddSubBlocksRequest extends CommonAuthorizedRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'number' => ['int', 'required', 'min:1'],
        ];
    }
}
