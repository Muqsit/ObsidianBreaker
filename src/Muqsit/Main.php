<?php
namespace Muqsit;

use pocketmine\block\Block;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onTap(PlayerInteractEvent $e){
    $p = $e->getPlayer();
    $block = $e->getBlock();
    if($p->getInventory()->getItemInHand()->getId() === 392 && $block->getId() === 49){
      $h = $block->getHardness();
      
      /*
      if($h >= 37.5){
        $mt_h = 4;
      }elseif($h >= 25 && < 37.5){
        $mt_h = 3;
      }elseif($h >= 12.5 && < 25){
        $mt_h = 2;
      }elseif($h >= 1 && < 12.5){
        $mt_h = 1;
      }else{
        $mt_h = 4;
      }
      */
      
      $p->sendMessage(TF::LIGHT_PURPLE . "Durability of this block is " . TF::WHITE . $mt_h . "/4");
    }
  }
}
