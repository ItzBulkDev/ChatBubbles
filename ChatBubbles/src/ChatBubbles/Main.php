<?php

namespace ChatBubbles;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\Player;

class Main extends PluginBase implements Listener{
    public $text;
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->text = [];
        $this->getLogger()->info("[ChatBubbles] ChatBubbles Loaded!");
    }
    
   /**
    * @param PlayerChatEvent $event
    *
    * @priority       NORMAL
    * @ignoreCanceled false
    */
    public function onChat(PlayerChatEvent $event){
        $player = $event->getPlayer();
        $message = $event->getMessage();
        if($player->hasPermission("chatbubbles.show")){
            if(isset($this->text[$player->getName()])){
                $this->getServer()->getScheduler()->cancelTask($this->text[$player->getName()][1]);
                unset($this->text[$player->getName()]);
            }
            $t = new TextManager($this);
            $t->createBubble($player, $message);
            $h = ($this->getServer()->getScheduler()->scheduleDelayedTask($t,$this->getConfig()->get("ShowMessageTime")));
            $this->text[$player->getName()] = array($t,$h);
            $event->setCancelled(true);
        }
    }
    public function onDisable(){
        $this->getLogger()->info("[ChatBubbles] ChatBubbles Unloaded!");
    }
}
