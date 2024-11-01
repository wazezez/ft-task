<?php

namespace app\Http\Controllers\Api\Warehouse;


use App\Http\Controllers\Controller;
use App\Services\WarehouseService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DetailsWarehouseController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(WarehouseService $warehouseService): JsonResponse
    {
        try {
            $warehouseDetails = $warehouseService->getWarehouseDetails(1);

            return Response::json([
                'list' => $warehouseDetails
            ]);
        } catch (Exception $e) {
            return Response::json([
                'message' => $e->getMessage()
            ], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
