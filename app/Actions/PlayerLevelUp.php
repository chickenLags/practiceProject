<?php

namespace App\Actions;

use App\Models\Player;
use Faker\Generator;
use TCG\Voyager\Actions\AbstractAction;

class PlayerLevelUp extends AbstractAction
{
    public function getTitle()
    {
        return 'Lvl up';
    }

    public function getIcon()
    {
        return 'voyager-double-up';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
        ];
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'players';
    }

    public function getDefaultRoute()
    {
        /* @var Player $player*/
        $player = $this->data;
        $player->levelUp();
        return route('voyager.players.index');
    }

}
