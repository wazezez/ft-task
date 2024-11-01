<?php

namespace App\Services;

use App\Dto\BoxRequestDataDto;
use App\Models\Box;
use App\Repositories\BoxRepository;
use Illuminate\Support\Collection;
use Psr\SimpleCache\CacheInterface;

class BoxService
{
    public function __construct(
        private readonly BoxRepository $boxRepository,
        private readonly WarehouseStateService $warehouseStateService
    ) {
    }

    public function create(BoxRequestDataDto $boxDto): Box
    {
        $box = $this->boxRepository->create($boxDto);
        $this->warehouseStateService->clearState();
        return $box;
    }

    public function createMultiple(int $quantity, BoxRequestDataDto $boxDto): void
    {
       $this->boxRepository->createMultiple($quantity, $boxDto);
       $this->warehouseStateService->clearState();
    }

    public function update(Box $box, BoxRequestDataDto $boxDto): Box
    {
        $box = $this->boxRepository->update($box, $boxDto);
        $this->warehouseStateService->clearState();
        return $box;
    }

    public function updateMultiple(array $ids, BoxRequestDataDto $boxDto): void
    {
        $this->boxRepository->updateMultiple($ids, $boxDto);
        $this->warehouseStateService->clearState();
    }

    public function getAllBoxes(): Collection
    {
        return $this->boxRepository->findAll();
    }
}
