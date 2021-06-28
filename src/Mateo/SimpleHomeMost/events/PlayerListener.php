<?php

namespace Mateo\SimpleHomeMost\events;

use Mateo\SimpleHomeMost\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;

class PlayerListener implements Listener
{

    public function onMove(PlayerMoveEvent $event)
    {
        if(isset(Main::getDataHandler()->movements[$event->getPlayer()->getRawUniqueId()]))
        {
            Main::getInstance()->getScheduler()->cancelTask(Main::getDataHandler()->movements[$event->getPlayer()->getRawUniqueId()]);
            unset(Main::getDataHandler()->movements[$event->getPlayer()->getRawUniqueId()]);
            $event->getPlayer()->sendMessage("§c» The teleportation has been cancelled.");
        }
    }

    public function onLeave(PlayerQuitEvent $event)
    {
        if (isset(Main::getDataHandler()->movements[$event->getPlayer()->getRawUniqueId()])) unset(Main::getDataHandler()->movements[$event->getPlayer()->getRawUniqueId()]);
    }
}