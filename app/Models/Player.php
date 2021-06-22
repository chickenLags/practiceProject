<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'strength',
        'vitality',
        'agility',
        'wisdom',
        'spirit',
        'hit_rate',
        'luck',
        'evasion',
        'speed',
        'x',
        'y',
    ];

    protected $defaultAttributes = [
        'level' => 1,
        'hp' => 10,
        'strength' => 1,
        'vitality' => 1,
        'agility' => 1,
        'wisdom' => 1,
        'spirit' => 1,
        'hit_rate' => 1,
        'luck' => 1,
        'evasion' => 1,
        'speed' => 1,
        'x' => 0,
        'y' => 0,
    ];

    public function __construct(array $attributes = [])
    {
        if (empty($attributes)) {
            $attributes = $this->defaultAttributes;
        }

        parent::__construct($attributes);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getStartX() {
        return $this->x - (WorldMap::$desiredChunkCount / 2);
    }

    public function getEndX() {
        return $this->x + (WorldMap::$desiredChunkCount / 2);
    }

    public function getStartY() {
        return $this->y - (WorldMap::$desiredChunkCount / 2);
    }

    public function getEndY() {
        return $this->y + (WorldMap::$desiredChunkCount / 2);
    }

    public function battle(){
        return $this->hasOne(Battle::class);
    }

}
