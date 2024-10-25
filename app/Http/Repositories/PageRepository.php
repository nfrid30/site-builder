<?php

namespace App\Http\Repositories;

use App\Models\Page;

class PageRepository
{
    public function __construct(
        protected Page $model
    )
    {
    }

    public function getByUri(string $requestUri): Page
    {
        /** @var Page $page */
        $page = $this->model->query()
            ->where('path', $requestUri)
            ->with(['showBlocks.template.generalBlock.showBlocks', 'showBlocks.showBlocks.template'])
            ->firstOrFail();

        return $page;
    }
}
