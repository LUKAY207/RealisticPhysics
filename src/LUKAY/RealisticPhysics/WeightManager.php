<?php

namespace LUKAY\RealisticPhysics;

use pocketmine\player\Player;

class WeightManager {

    private array $playerWeightList = [];
    private const HELMET_WEIGHT = 2;
    private const CHESTPLATE_WEIGHT = 6;
    private const LEGGINGS_WEIGHT = 4;
    private const BOOTS_WEIGHT = 2;

    public function add(Player $player, int $amount): void {
        $this->playerWeightList[$player->getName()] = $this->playerWeightList[$player->getName()] + $amount;
    }

    public function get(string $key): int {
        if ($key === "HELMET_WEIGHT") return self::HELMET_WEIGHT;
        if ($key === "CHESTPLATE_WEIGHT") return self::CHESTPLATE_WEIGHT;
        if ($key === "LEGGINGS_WEIGHT") return self::LEGGINGS_WEIGHT;
        if ($key === "BOOTS_WEIGHT") return self::BOOTS_WEIGHT;
        return 0;
    }

    public function from(Player $player): int {
        return $this->playerWeightList[$player->getName()];
    }

    public function getPlayerWeightList(): array {
        return $this->playerWeightList;
    }

    /**
     * @param array $playerWeightList
     */
    public function setPlayerWeightList(array $playerWeightList): void {
        $this->playerWeightList = $playerWeightList;
    }
}
