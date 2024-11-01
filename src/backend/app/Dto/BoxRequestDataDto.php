<?php

namespace App\Dto;

use App\Enums\BoxContentTypes;

final readonly class BoxRequestDataDto
{
    public function __construct(
        public int             $roomId,
        public ?BoxContentTypes $contentType,
    ) {
    }
}
