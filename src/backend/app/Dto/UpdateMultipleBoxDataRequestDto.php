<?php

namespace App\Dto;

final readonly class UpdateMultipleBoxDataRequestDto
{
    public function __construct(
        public array $ids,
        public BoxRequestDataDto $boxRequestDataDto,
    ) {
    }
}
