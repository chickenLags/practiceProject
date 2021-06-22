<?php


namespace App\Http\Helpers;


class DangerNoise extends PerlinNoise
{

    public function __construct()
    {
        parent::__construct(12345);
    }

}
