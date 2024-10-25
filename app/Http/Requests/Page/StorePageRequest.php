<?php

namespace App\Http\Requests\Page;

use App\Http\Requests\Common\CommonAuthorizedRequest;
use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StorePageRequest extends CommonAuthorizedRequest
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
            'path' => ['required', 'string', 'max:100',
                Rule::unique(Page::class, 'path')],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'path' => '/' . Str::slug($this->name),
        ]);

    }
}
