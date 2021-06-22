<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chunk extends Model
{
    use HasFactory;

    protected $fillable = [
        'x',
        'y',
        'danger_index',
        'world_map_id',
    ];

    public function worldMap() {
        return $this->belongsTo(WorldMap::class);
    }

    public function getPosition() {
        return ['x' => $this->x, 'y' => $this->y];
    }

    public function getIndex($startX, $startY) {
        $rows = $this->x - $startX;
        $cols = $this->y - $startY;
        return  ($cols ) + ($rows * (WorldMap::$desiredChunkCount + 1));
    }

    public function sameLocationAsPlayer(Player $player) {
        return $player->x === $this->x && $player->y === $this->y;
    }
}
