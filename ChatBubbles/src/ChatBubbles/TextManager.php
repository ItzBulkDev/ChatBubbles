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
        $this->m = wordwrap($message, 25, "\n");
        $this->p->setNameTag("<" . $this->p->getDisplayName() . ">\n" . $this->m);
    }
}
