<?php

namespace App\Http\Services;

use App\Models\Template;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TemplateService
{

    public function create(array $properties, array|UploadedFile|null $image)
    {

        $filename = $properties['slug'] . '.' . $image->getClientOriginalExtension();
        $path = 'templates';
        Storage::putFileAs($path, $image, $filename);
        $properties['cover'] = $path . '/' . $filename;

        return Template::query()->create($properties);
    }
}
