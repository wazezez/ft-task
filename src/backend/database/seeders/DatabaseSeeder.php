<?php

namespace Database\Seeders;

use App\Enums\BoxContentTypes;
use App\Models\Box;
use App\Models\Room;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $warehouse = Warehouse::create([
            'name' => 'Основной склад'
        ]);


        Room::factory(5)->create([
            'warehouse_id' => $warehouse->id,
        ]);

        Box::factory(5)->create([
            'room_id' => rand(1,5),
            'content_type' => BoxContentTypes::APPLES
        ]);
    }
}
