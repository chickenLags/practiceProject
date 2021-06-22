<?php

namespace App\Models;

use App\Http\Helpers\DangerNoise;
use App\Http\Helpers\PerlinNoise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class WorldMap extends Model
{
    use HasFactory;

    public static int $desiredChunkCount = 64;

    public $fillable = [
        'name',
        'description',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function scopeAroundPlayer(Builder $query, Player $player) {
        return $query->whereHas('chunks', function (Builder $chunkQuery) use ($player) {
            return $chunkQuery
                ->where('x', '>', $player->x - (self::$desiredChunkCount / 2))
                ->where('x', '<', $player->x + (self::$desiredChunkCount / 2))
                ->where('y', '>', $player->y - (self::$desiredChunkCount / 2))
                ->where('y', '<', $player->y + (self::$desiredChunkCount / 2));
        });
    }

    public function chunks() {
        return $this->hasMany(Chunk::class);
    }

    public function hasAllChunks()
    {
        return $this->chunks->count() === (self::$desiredChunkCount + 1) * (self::$desiredChunkCount + 1);
    }

    public function AssureAllChunks(Player $player) {
        if ($this->hasAllChunks()) {
            return;
        }

        $xCoords = collect(range($player->getStartX(), $player->getEndX()));
        $yCoords = collect(range($player->getStartY(), $player->getEndY()));

        $coordsCombinations = $xCoords->crossJoin($yCoords);

        $indices = new Collection();
        $indices->push($this->chunks->map->getIndex($player->getStartX(), $player->getStartY()));
        $missingCoords = $coordsCombinations->diffKeys($indices->flatten()->flip());

        $dangerNoise = new DangerNoise();

        $missingCoords->each(function($coord) use ($dangerNoise) {
            $this->chunks->push( Chunk::create([
                'x' => $coord[0],
                'y' => $coord[1],
                'danger_index' => $dangerNoise->random2D($coord[0] / 32, $coord[1] / 32),
                'world_map_id' => $this->id
            ]));
        });
    }

    public function sortChunks() {
        $this->chunks = $this->chunks->sortBy('y')->sortBy('x');
    }
}
