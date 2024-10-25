<?php

namespace App\Http\Requests\Backup;

use App\Http\Requests\Common\CommonAuthorizedRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBackupRequest extends CommonAuthorizedRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100',
            ],
            'description' => [
                'string',
                'max:2000',
            ]
        ];
    }
}
