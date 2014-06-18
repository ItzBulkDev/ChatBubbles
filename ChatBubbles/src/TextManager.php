<?php
namespace ChatBubbles;
use pocketmine\scheduler\PluginTask;
use pocketmine\Player;

class TextManager extends PluginTask{
    private $c, $p;
    public function onRun($tick){
        $this->remove();
        $this->revert();
        $this->c = true;
    }
    public function remove(){
        //Remove bubble
    }
    public function revert(){
        //Revert to username $this->p->getName()
    }
    public function createBubble($player, $message){
        $this->c = false;
        $this->p = $player;
        //Create text bubble
    }
}
