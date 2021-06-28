<?php

namespace App\Actions;

use App\Models\Player;
use Faker\Generator;
use TCG\Voyager\Actions\AbstractAction;

class PlayerMassLevelUp extends AbstractAction
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
            'class' => 'btn btn-sm btn-primary ',
        ];
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'players';
    }

    public function getDefaultRoute()
    {
    }

    public function massAction($ids, $comingFrom)
    {
        $players = Player::whereIn('id', $ids)->get();
        $players->each->levelUp();
        return redirect($comingFrom);
    }

}
