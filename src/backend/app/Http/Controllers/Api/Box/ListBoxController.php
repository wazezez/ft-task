<?php

namespace App\Http\Controllers\Api\Box;

use App\Http\Controllers\Controller;
use App\Services\BoxService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ListBoxController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, BoxService $boxService): JsonResponse
    {
        $list = $boxService->getAllBoxes();

        return Response::json([
            'list' => $list
        ]);
    }
}
