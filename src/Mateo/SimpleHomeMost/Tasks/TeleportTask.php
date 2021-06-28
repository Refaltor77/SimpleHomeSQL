<?php


namespace Mateo\SimpleHomeMost\Tasks;


use Mateo\SimpleHomeMost\Main;
use pocketmine\level\Position;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class TeleportTask extends Task
{
    private $uuid;
    private $time = 10;
    private Position $position;

    public function __construct($uuid, $time, Position $position)
    {
        $this->uuid = $uuid;
        $this->time = $time;
        $this->position = $position;

    }

    public function onRun(int $currentTick)
    {
        $player = Server::getInstance()->getPlayerByRawUUID($this->uuid);

        if (!is_null($player))
        {
            if ($this->time <= 0)
            {
                $player->teleport($this->position);
                Main::getInstance()->getScheduler()->cancelTask($this->getTaskId());
                unset(Main::getDataHandler()->movements[$this->uuid]);
            }else{
                Main::getDataHandler()->movements[$this->uuid] = $this->getTaskId();
                $player->sendPopup("§a» Teleport in ". $this->time);
                $this->time--;
            }
        }else{
            Main::getInstance()->getScheduler()->cancelTask($this->getTaskId());
        }
    }
}