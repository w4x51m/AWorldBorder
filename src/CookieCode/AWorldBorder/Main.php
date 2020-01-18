<?php

namespace CookieCode\AWorldBorder;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\plugin\PluginBase as PL;

class Main extends PL implements Listener {

	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("World Border Active!");
		$this->saveDefaultConfig();
	}

	public function onMove(PlayerMoveEvent $ev){
		$player = $ev->getPlayer();
		$level = $this->getServer()->getDefaultLevel();
		$distance = $level->getSpawnLocation()->distance($player);

		if($distance >= 20) { //config usage $this->getConfig()->get("border_radius")
			$ev->setCancelled(true);
			$player->sendMessage("You Cannot Pass The Border!");
		}
	}
}
