<?php

namespace app\Dto;

final readonly class CreateMultipleBoxDataRequestDto
{
    public function __construct(
        public int $quantity,
        public BoxRequestDataDto $boxRequestDataDto,
    ) {
    }
}
