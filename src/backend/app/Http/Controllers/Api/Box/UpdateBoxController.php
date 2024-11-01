<?php

namespace App\Http\Controllers\Api\Box;

use App\Dto\BoxRequestDataDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Box\UpdateBoxRequest;
use App\Models\Box;
use App\Services\BoxService;

class UpdateBoxController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Box $box, UpdateBoxRequest $request, BoxService $boxService)
    {
    }
}
