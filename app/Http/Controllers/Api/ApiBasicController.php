<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Menu\MenuResource;
use App\Http\Services\MenuService;
use App\Http\Services\SettingService;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class ApiBasicController extends Controller
{
    public function __construct(
        protected SettingService $settingService,
        protected MenuService $menuService,
    )
    {
    }

    #[OA\Get(
        path: "/basic",
        tags: ["BASIC"],
    )]
    #[OA\Response(
        response: 200,
        description: "Basic data",
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "settings", properties: [], type: "object"),
                new OA\Property(
                    property: "menus",
                    type: "array",
                    items: new OA\Items(properties: [
                        new OA\Property(property: "id", type: "integer", example: 2),
                        new OA\Property(property: "type", type: "string", example: "simple"),
                        new OA\Property(property: "fields", properties: [], type: "object"),
                    ]))
            ]
        ))
    ]

    public function index(): JsonResponse
    {
        return response()->json(
            [
                'settings' => $this->settingService->getParsed(),
                'menus' => MenuResource::collection($this->menuService->getParsed()),
            ]
        );
    }
}
