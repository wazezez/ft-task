<?php

namespace app\Services;

use App\Models\Warehouse;
use Psr\SimpleCache\CacheInterface;

class WarehouseStateService
{
    private string $cacheStoreKey = 'warehouse';

    public function __construct(private readonly CacheInterface $cacheManager)
    {
    }

    public function hasState(): bool
    {
        return $this->cacheManager->has($this->cacheStoreKey);
    }

    public function getState(): Warehouse
    {
        return $this->cacheManager->get($this->cacheStoreKey);
    }

    public function remember(callable $callback)
    {
        return $this->cacheManager->remember($this->cacheStoreKey, 3600, $callback);
    }

    public function clearState(): void
    {
        $this->cacheManager->forget($this->cacheStoreKey);
    }
}
