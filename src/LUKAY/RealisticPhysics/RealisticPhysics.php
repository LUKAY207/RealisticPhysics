<?php

namespace LUKAY\RealisticPhysics;

use LUKAY\RealisticPhysics\listener\PlayerMoveListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class RealisticPhysics extends PluginBase {
    use SingletonTrait;

    protected function onLoad(): void {
        self::setInstance($this);
    }

    protected function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents(new PlayerMoveListener(), $this);
    }
}