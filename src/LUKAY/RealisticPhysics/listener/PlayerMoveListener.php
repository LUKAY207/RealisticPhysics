<?php

namespace LUKAY\RealisticPhysics\listener;

use LUKAY\RealisticPhysics\WeightManager;
use pocketmine\entity\Attribute;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;

class PlayerMoveListener implements Listener {

    public function onMove(PlayerMoveEvent $event): void {
        $weight = new WeightManager();
        $playerWeightList = $weight->getPlayerWeightList();
        $player = $event->getPlayer();
        if (!array_key_exists($player->getName(), $playerWeightList)) {
            $playerWeightList[$player->getName()] = 0;
            $weight->setPlayerWeightList($playerWeightList);
        }

        if ($player->getArmorInventory()->getHelmet()->getName() !== "Air") {
            $weight->add($player, $weight->get("HELMET_WEIGHT"));
        }
        if ($player->getArmorInventory()->getChestplate()->getName() !== "Air") {
            $weight->add($player, $weight->get("CHESTPLATE_WEIGHT"));
        }
        if ($player->getArmorInventory()->getLeggings()->getName() !== "Air") {
            $weight->add($player, $weight->get("LEGGINGS_WEIGHT"));
        }
        if ($player->getArmorInventory()->getBoots()->getName() !== "Air") {
            $weight->add($player, $weight->get("BOOTS_WEIGHT"));
        }
        $playerWeight = $weight->from($player);

        if ($player->isSprinting() && $playerWeight >= 0 && $playerWeight < 5) {
            $player->getAttributeMap()->get(Attribute::MOVEMENT_SPEED)->setValue(0.2);
        } elseif (!$player->isSprinting() && $playerWeight >= 5 && $playerWeight < 10) {
            $player->getAttributeMap()->get(Attribute::MOVEMENT_SPEED)->setValue(0.17);
        }
        if ($player->isSprinting() && $playerWeight >= 5 && $playerWeight < 10) {
            $player->getAttributeMap()->get(Attribute::MOVEMENT_SPEED)->setValue(0.15);
        } elseif (!$player->isSprinting() && $playerWeight >= 5 && $playerWeight < 10) {
            $player->getAttributeMap()->get(Attribute::MOVEMENT_SPEED)->setValue(0.12);
        }
        if ($player->isSprinting() && $playerWeight >= 10 && $playerWeight < 15) {
            $player->getAttributeMap()->get(Attribute::MOVEMENT_SPEED)->setValue(0.08);
        } elseif (!$player->isSprinting() && $playerWeight >= 5 && $playerWeight < 10) {
            $player->getAttributeMap()->get(Attribute::MOVEMENT_SPEED)->setValue(0.05);
        }
    }
}
