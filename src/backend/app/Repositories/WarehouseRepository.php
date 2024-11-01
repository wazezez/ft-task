<?php

namespace App\Repositories;

use App\Models\Warehouse;
use Illuminate\Database\Query\Builder;

class WarehouseRepository
{
    public function getDetailsById(int $warehouseId): Warehouse | null
    {
        return Warehouse::query()
            ->where('id', $warehouseId)
            ->with([
                'rooms' => function ($query) {
                    $query->with('boxes');
                }
            ])
            ->first();
    }
}
