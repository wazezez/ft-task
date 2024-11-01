<?php

namespace App\Repositories;

use App\Dto\BoxRequestDataDto;
use App\Models\Box;
use Illuminate\Support\Collection;

class BoxRepository
{
    public function create(BoxRequestDataDto $dto): Box
    {
        return Box::create([
            'room_id' => $dto->roomId,
            'content_type' => $dto->contentType,
        ]);
    }

    public function createMultiple(int $quantity, BoxRequestDataDto $dto): void
    {
        Box::insert(array_fill(0, $quantity, [
            'room_id' => $dto->roomId,
            'content_type' => $dto->contentType,
        ]));
    }

    public function update(Box $box, BoxRequestDataDto $dto): Box
    {
        Box::update([
            'room_id' => $dto->roomId,
            'content_type' => $dto->contentType,
        ]);

        return $box->refresh();
    }

    public function updateMultiple(array $ids, BoxRequestDataDto $dto): void
    {
        Box::query()->whereIn('id', $ids)->update([
            'room_id' => $dto->roomId,
        ]);
    }

    public function findAll(): Collection
    {
        return Box::all();
    }
}
