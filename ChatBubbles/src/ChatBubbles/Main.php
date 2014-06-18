<?php

namespace ChatBubbles;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\Player;

use ChatBubbles\TextManager;

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
        if(isset($this->text[$player->getName()])) if($this->text[$player->getName()]->c !== true) $this->text[$player->getName()]->remove();
        $this->text[$player->getName()] = new TextManager($this);
        $this->text[$player->getName()]->createBubble($player, $message);
        $this->getServer()->getScheduler()->scheduleDelayedTask($this->text[$player->getName()],$this->getConfig()->get("ShowMessageTime"));
        $event->setCancelled(true);
    }
    
    public function onDisable(){
        $this->getLogger()->info("[ChatBubbles] ChatBubbles Unloaded!");
    }
}
