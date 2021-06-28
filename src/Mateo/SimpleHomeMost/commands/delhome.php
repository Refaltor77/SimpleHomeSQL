<?php

namespace Mateo\SimpleHomeMost\commands;

use Mateo\SimpleHomeMost\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class delhome extends PluginCommand
{
    public function __construct(string $name, Plugin $owner)
    {
        parent::__construct($name, $owner);
        $this->setDescription("Delete home command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player)
        {
            if (!isset($args[0])) return $sender->sendMessage("§c» Command usage: /delhome <home>");
            Main::getDataHandler()->removeHome($sender->getRawUniqueId(), $args[0]);
        }
    }
}