<?php

namespace App\Http\Controllers\Api\Box;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Box\CreateBoxRequest;
use App\Services\BoxService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CreateBoxController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateBoxRequest $request, BoxService $boxService): JsonResponse
    {
        try {
            $box = $boxService->create($request->getDto());

            return Response::json([
                'box' => $box
            ]);
        } catch (\Exception $e) {
            return Response::json([
                'message' => $e->getMessage()
            ], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
