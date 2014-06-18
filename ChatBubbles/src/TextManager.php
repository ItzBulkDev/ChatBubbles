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
        $playername = $this->p->getName();
        $playername->setNameTag(" ");
        //This should just remove the text from the Name Tag
    }
    public function revert(){
        $playername = $this->p->getName();
        $playername->setNameTag($player);
        //This should work
    }
    public function createBubble($player, $message){
        $this->c = false;
        $this->p = $player;
        $this->p->setNameTag($message);
        //This will not seperate the message into lines and may look ugly
        //I will have to try to seperate the messages into lines later
    }
}
?>
