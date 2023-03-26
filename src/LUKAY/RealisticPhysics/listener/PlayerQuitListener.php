<?php

namespace LUKAY\RealisticPhysics\listener;

use LUKAY\RealisticPhysics\WeightManager;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;

class PlayerQuitListener implements Listener  {

    public function onQuit(PlayerQuitEvent $event): void {
        $weight = new WeightManager();
        $weightPlayerList = $weight->getPlayerWeightList();
        $player = $event->getPlayer();
        $weightPlayerList[$player->getName()] = 0;
        $weight->setPlayerWeightList($weightPlayerList);
    }
}