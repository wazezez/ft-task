<?php

namespace App\Services;

use App\Models\Warehouse;
use App\Repositories\WarehouseRepository;
use Psr\SimpleCache\CacheInterface;

class WarehouseService
{

    public function __construct(
        private readonly WarehouseRepository $warehouseRepository,
        private readonly WarehouseStateService $warehouseStateService
    ) {
    }

    public function getWarehouseDetails(int $warehouseId): Warehouse | null
    {
        if ($this->warehouseStateService->hasState()) {
            return $this->warehouseStateService->getState();
        }

        return $this->warehouseStateService->remember(function () use ($warehouseId) {
            return $this->warehouseRepository->getDetailsById($warehouseId);
        });
    }
}
