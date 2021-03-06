<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;

    public function player() {
        return $this->hasOne(Player::class, 'id', 'player_id');
    }

    public function monster() {
        return $this->hasOne(Monster::class, 'id', 'monster_id');
    }
}
