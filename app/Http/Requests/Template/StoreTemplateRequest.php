<?php

namespace App\Http\Requests\Template;

use App\Enums\TemplateTypeEnum;
use App\Http\Requests\Common\CommonAuthorizedRequest;
use App\Models\Template;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreTemplateRequest extends CommonAuthorizedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'int', new Enum(TemplateTypeEnum::class)],
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'slug' => ['required', 'string', 'min:3', 'max:100',
                Rule::unique(Template::class, 'slug')],
            'cover' => ['required','file', 'image'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
