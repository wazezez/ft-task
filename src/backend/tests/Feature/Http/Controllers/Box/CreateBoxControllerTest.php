<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Dto\BoxRequestDataDto;
use Tests\TestCase;

class CreateBoxControllerTest extends TestCase
{
    use RefreshDatabase;

    private readonly \App\Dto\BoxRequestDataDto|null $createDto;

    public function setUp(): void
    {
        parent::setUp();

        $warehouse = \App\Models\Warehouse::create([
            'name' => 'Основной склад',
        ]);

        $room = \App\Models\Room::create([
            'warehouse_id' => $warehouse->id,
        ]);

        $this->createDto = new BoxRequestDataDto(
            roomId: $room->id,
            contentType: \App\Enums\BoxContentTypes::APPLES
        );
    }

    public function test_success_creates_box(): void
    {
        $response = $this->post(route('api.boxes.create'), [
            'content_type' => $this->createDto->contentType->value,
            'room_id' => $this->createDto->roomId
        ]);

        $response->assertStatus(200)
                    ->assertJson([
                        'box' => [
                            'content_type' => $this->createDto->contentType->value,
                            'room_id' => $this->createDto->roomId
                        ]
                    ]);
    }

    public function test_returns_validation_error_when_creates_box(): void
    {
        $response = $this->post(route('api.boxes.create'), [
            'content_type' => 'default',
            'room_id' => $this->createDto->roomId + 1
        ]);

        $response->assertSessionHasErrors([
            'content_type',
            'room_id'
        ]);
    }
}
