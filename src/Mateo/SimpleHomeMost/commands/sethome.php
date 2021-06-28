<?php

namespace Mateo\SimpleHomeMost\commands;

use Mateo\SimpleHomeMost\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class sethome extends PluginCommand
{
    public function __construct(string $name, Plugin $owner)
    {
        parent::__construct($name, $owner);
        $this->setDescription("Set home command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player)
        {
            if (!isset($args[0])) return $sender->sendMessage("§c» Command usage: /sethome <home>");
            Main::getDataHandler()->addHome($sender->getRawUniqueId(), $args[0], $sender->getPosition());
        }
    }
}