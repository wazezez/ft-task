<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Traits\Tappable;

class Box extends Model
{
    use HasFactory;
    use Tappable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_id',
        'content_type'
    ];

    public function room() : BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
