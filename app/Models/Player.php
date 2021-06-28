<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'hp',
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
        'image_url',
    ];

    public function __construct(array $attributes = [])
    {
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

    public function maxHp() {
        return (3 * $this->level) * ((0.3 * $this->vitality) + (0.2 * $this->wisdom));
    }

    public function levelUp() {
        $this->level += 1;
        $this->strength += random_int(0, 10);;
        $this->vitality += random_int(0, 10);;
        $this->agility += random_int(0, 10);;
        $this->wisdom += random_int(0, 10);;
        $this->spirit += random_int(0, 10);;
        $this->hit_rate += random_int(0, 10);;
        $this->luck += random_int(0, 10);;
        $this->evasion += random_int(0, 10);;
        $this->speed += random_int(0, 10);;
        $this->hp = $this->maxHp();

        $this->save();
    }

    public function heal($amount = null){
        if (!$amount) {
            $this->hp = $this->maxHp();
            $this->save();
            return;
        }

        $this->hp += $amount;
        if ($this->hp > $this->maxHp()) {
            $this->hp = $this->maxHp();
        }
        $this->save();
    }

}
