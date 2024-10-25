<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Page\PageResource;
use App\Http\Services\PageService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;


class ApiPageController extends Controller
{
    public function __construct(
        protected PageService $pageService,
    ) {
    }

    #[OA\Get(
        path: "/pages/{slug}",
        tags: ['PAGES'],
        parameters: [
            new OA\Parameter(
                name: "slug",
                in: "path",
                required: false,
                schema: new OA\Schema(type: "string"),
                example: ""
            )
        ]
    )]
    #[OA\Response(
        response: 200,
        content: new OA\JsonContent(
        properties: [
            new OA\Property(property: "id", type: "integer", example: 5),
            new OA\Property(property: "meta", type: "array", items: new OA\Items(properties: [
                    new OA\Property(property: "title", type: "string", example: "Meta Title"),
                    new OA\Property(property: "description", type: "string", example: "Meta Description"),
                    new OA\Property(property: "keywords", type: "string", example: "Meta Keywords"),
                    new OA\Property(property: "image", type: "string", example: "/link"),
                ])),
            new OA\Property(property: "blocks", type: "array", items: new OA\Items(ref: "#/components/schemas/Block")),
        ],
        type: "object"
    ))]
    #[OA\Response(ref: "#/components/responses/404", response: 404)]

    public function index(Request $request): PageResource
    {

        $uri = str_replace('/api/pages', '', $request->getRequestUri());
        $uri = $uri ?: '/';
        return PageResource::make($this->pageService->getByUri($uri));
    }
}
