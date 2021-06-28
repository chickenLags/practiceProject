<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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

        'image_url',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function battle(){
        return $this->hasOne(Battle::class);
    }

    public function getFullNameAttribute() {
        return "lvl.$this->level $this->name";
    }

    public $additional_attributes = ['full_name'];
}
