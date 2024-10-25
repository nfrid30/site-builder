<?php

namespace App\Http\Requests\Page;

use App\Http\Requests\Common\CommonHasBlockRequest;
use App\Http\Requests\Tag\TagValidationTrait;
use App\Models\Page;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends CommonHasBlockRequest
{
    use TagValidationTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge(
            parent::rules(),
            $this->tagRules(), [
            'name' => ['required', 'string', 'max:100'],
            'path' => ['required', 'string', 'max:100',
                Rule::unique(Page::class, 'path')->ignore($this->page)],
            'meta_title' => ['required', 'string', 'max:100'],
            'meta_description' => ['required', 'string', 'max:250'],
            'meta_keywords' => ['required', 'string', 'max:250'],
            'meta_image' => [],
        ]);
    }
}
