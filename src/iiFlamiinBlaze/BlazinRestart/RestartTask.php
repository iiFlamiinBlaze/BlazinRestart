<?php
/**
 *  ____  _            _______ _          _____
 * |  _ \| |          |__   __| |        |  __ \
 * | |_) | | __ _ _______| |  | |__   ___| |  | | _____   __
 * |  _ <| |/ _` |_  / _ \ |  | '_ \ / _ \ |  | |/ _ \ \ / /
 * | |_) | | (_| |/ /  __/ |  | | | |  __/ |__| |  __/\ V /
 * |____/|_|\__,_/___\___|_|  |_| |_|\___|_____/ \___| \_/
 *
 * Copyright (C) 2018 iiFlamiinBlaze
 *
 * iiFlamiinBlaze's plugins are licensed under MIT license!
 * Made by iiFlamiinBlaze for the PocketMine-MP Community!
 *
 * @author iiFlamiinBlaze
 * Twitter: https://twitter.com/iiFlamiinBlaze
 * GitHub: https://github.com/iiFlamiinBlaze
 * Discord: https://discord.gg/znEsFsG
 */
declare(strict_types=1);

namespace iiFlamiinBlaze\BlazinRestart;

use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat;

class RestartTask extends Task{

	/** @var int $seconds */
	private $seconds = 0;

	public function onRun(int $tick) : void{
		$this->seconds++;
		$time = intval(BlazinRestart::getInstance()->getConfig()->get("restart-time")) * 60;
		$restartTime = $time - $this->seconds;
		switch($restartTime){
			case 100:
				BlazinRestart::getInstance()->getServer()->broadcastMessage(BlazinRestart::PREFIX . TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 2 minutes");
				return;
			case 50:
				BlazinRestart::getInstance()->getServer()->broadcastMessage(BlazinRestart::PREFIX . TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 1 minute");
				return;
			case 25:
				BlazinRestart::getInstance()->getServer()->broadcastMessage(BlazinRestart::PREFIX . TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 30 seconds");
				return;
			case 10:
				BlazinRestart::getInstance()->getServer()->broadcastMessage(BlazinRestart::PREFIX . TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 10 seconds");
				return;
			case 5:
				BlazinRestart::getInstance()->getServer()->broadcastMessage(BlazinRestart::PREFIX . TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 5 seconds");
				return;
			case 4:
				BlazinRestart::getInstance()->getServer()->broadcastMessage(BlazinRestart::PREFIX . TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 4 seconds");
				return;
			case 3:
				BlazinRestart::getInstance()->getServer()->broadcastMessage(BlazinRestart::PREFIX . TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 3 seconds");
				return;
			case 2:
				BlazinRestart::getInstance()->getServer()->broadcastMessage(BlazinRestart::PREFIX . TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 2 seconds");
				return;
			case 1:
				BlazinRestart::getInstance()->getServer()->broadcastMessage(BlazinRestart::PREFIX . TextFormat::GREEN . "Server will restart in" . TextFormat::YELLOW . " 1 second");
				return;
			case 0:
				foreach(BlazinRestart::getInstance()->getServer()->getOnlinePlayers() as $player) $player->kick(strval(BlazinRestart::getInstance()->getConfig()->get("restart-message")));
				BlazinRestart::getInstance()->getServer()->shutdown();
				return;
		}
	}
}