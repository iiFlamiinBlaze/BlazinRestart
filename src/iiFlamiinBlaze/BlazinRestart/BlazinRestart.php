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

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class BlazinRestart extends PluginBase{

	public const VERSION = "v1.0.0";
	public const PREFIX = TextFormat::AQUA . "BlazinRestart" . TextFormat::GOLD . " > ";

	/** @var self $instance */
	private static $instance;

	public function onEnable() : void{
		self::$instance = $this;
		@mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
		$this->getScheduler()->scheduleRepeatingTask(new RestartTask(), 20);
		$this->getLogger()->info("BlazinRestart " . self::VERSION . " by BlazeTheDev is enabled");
	}

	public static function getInstance() : self{
		return self::$instance;
	}
}