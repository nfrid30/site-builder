<?php

namespace App\Http\Services;

use App\Http\Repositories\PageRepository;
use App\Http\Services\Block\BlockService;
use App\Models\Page;

class PageService
{
    public function __construct(
        protected BlockService $blockService,
        protected PageRepository $repository,
    ) {
    }

    public function getByUri(string $requestUri): Page
    {
        $page = $this->repository->getByUri($requestUri);
        $page->showBlocks = $this->blockService->processFields($page->showBlocks);

        return $page;
    }
}
