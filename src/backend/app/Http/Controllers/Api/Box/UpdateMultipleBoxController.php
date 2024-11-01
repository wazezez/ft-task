<?php

namespace app\Http\Controllers\Api\Box;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Box\UpdateMultipleBoxRequest;
use App\Services\BoxService;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateMultipleBoxController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateMultipleBoxRequest $request, BoxService $boxService)
    {
        try {
            $requestDataDto = $request->getDto();

            $boxService->updateMultiple($requestDataDto->ids, $requestDataDto->boxRequestDataDto);

            return Response::json([
                'message' => 'Success'
            ]);
        } catch (\Exception $e) {
            return Response::json([
                'message' => $e->getMessage()
            ], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
