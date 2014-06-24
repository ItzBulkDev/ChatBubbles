<?php

namespace ChatBubbles;

use pocketmine\scheduler\PluginTask;
use pocketmine\Player;

class TextManager extends PluginTask{
    private $p;
    public function onRun($tick){
        $this->revert();
    }
    public function revert(){
        $this->p->setNameTag($this->p->getDisplayName());
    }
    public function createBubble($player, $message){
        $this->p = $player;
        $this->m = $message;
        $this->p->setNameTag($this->p->getDisplayName() . ":\n\n" . $this->m);
        //This will not seperate the message into lines and may look ugly
        //I will have to try to seperate the messages into lines later
    }
}
