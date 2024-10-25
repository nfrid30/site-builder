<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    description: "This is a site builder API.",
    title: "Site Builder API",
)]
#[OA\Server(url: "/api")]
#[OA\Components(
    responses: [
        new OA\Response(
            response: 404,
            description: "Not Found",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "message", type: "string", example: "Record not found")
                ],
                type: "object"
            )
        )
    ])
]
abstract class Controller
{
    //
}
