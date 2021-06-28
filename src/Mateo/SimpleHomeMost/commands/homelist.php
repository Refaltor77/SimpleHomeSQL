<?php

namespace Mateo\SimpleHomeMost\commands;

use Mateo\SimpleHomeMost\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class homelist extends PluginCommand
{
    public function __construct(string $name, Plugin $owner)
    {
        parent::__construct($name, $owner);
        $this->setDescription("List all home command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player)
        {
            Main::getDataHandler()->listHome($sender->getRawUniqueId());
        }
    }
}