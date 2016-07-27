<?php
namespace Muqsit;
use pocketmine\block\Obsidian as PmObsidian;

class Obsidian extends PmObsidian{

    public function getResistance(){
        return 3000;
    }
}
