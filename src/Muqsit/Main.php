<?php
namespace Muqsit;

use pocketmine\block\Block;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\TextFormat as TF;
use Muqsit\Obsidian;

class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->registerBlock(self::OBSIDIAN, Obsidian::class);
  }
  
	public function registerBlock($id, $class){
		Block::$list[$id] = $class;
		$block = new $class();
		for($data = 0; $data < 16; ++$data){
			Block::$fullList[($id << 4) | $data] = new $class($data);
		}
		Block::$solid[$id] = $block->isSolid();
		Block::$transparent[$id] = $block->isTransparent();
		Block::$hardness[$id] = $block->getHardness();
		Block::$resistance[$id] = $block->getResistance();
		Block::$light[$id] = $block->getLightLevel();
		Block::$lightFilter[$id] = 1;//
	}
  
  public function onTap(PlayerInteractEvent $e){
    $p = $e->getPlayer();
    $block = $e->getBlock();
    if($p->getInventory()->getItemInHand()->getId() === 392 && $block->getId() === 49){
      $h = $block->getHardness();
      
      if($h >= 37.5){
        $mt_h = 4;
      }elseif($h >= 25 && $h < 37.5){
        $mt_h = 3;
      }elseif($h >= 12.5 && $h < 25){
        $mt_h = 2;
      }elseif($h >= 1 && $h < 12.5){
        $mt_h = 1;
      }else{
        $mt_h = 4;
      }
      
      $p->sendMessage(TF::LIGHT_PURPLE . "Durability of this block is " . TF::WHITE . $mt_h . "/4");
    }
  }
}
