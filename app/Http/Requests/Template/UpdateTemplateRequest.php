<?php

namespace App\Http\Requests\Template;

use App\Http\Requests\Common\CommonAuthorizedRequest;
use App\Models\Template;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateTemplateRequest extends CommonAuthorizedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'slug' => ['required', 'string', 'min:3', 'max:100',
                Rule::unique(Template::class, 'slug')->ignore($this->template)],
            'cover' => ['file', 'image'],
            'templates' => ['array'],
            'templates.*.options' => ['array'],
            'templates.*.id' => ['int', Rule::exists(Template::class, 'id')],
        ];
    }

    protected function prepareForValidation(): void
    {
        $templates = $this->templates;
        foreach ($templates ?? [] as &$template) {
            $template['options'] = array_values($template['options'] ?? []);
        }

        $this->merge([
            'templates' => $templates
        ]);

    }
}
