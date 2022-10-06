<?php

namespace HenryDM\DamageTP;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\player\Player;

class Main extends PluginBase implements Listener {

    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this); 
        $this->saveResource("config.yml");
    }

    public function onDamage(EntityDamageEvent $event) {

# ================================================        
        $entity = $event->getEntity();
        $cause = $event->getCause();
        $world = $entity->getWorld();
        $worldName = $world->getFolderName();
# ================================================

        if(in_array($worldName, $this->getConfig()->get("damage-tp-worlds", []))) {  
            if($this->getConfig()->get("tp-spawn-projectile") === true) {
                if(!$entity instanceof Player) return;
                if($cause === EntityDamageEvent::CAUSE_PROJECTILE) {
                    $entity->teleport($entity->getWorld()->getSpawnLocation());
                    $event->cancel();	
		}
            }

            if($this->getConfig()->get("tp-spawn-suffocation") === true) {
                if(!$entity instanceof Player) return;
                if($cause === EntityDamageEvent::CAUSE_SUFFOCATION) {
                    $entity->teleport($entity->getWorld()->getSpawnLocation());
                    $event->cancel();	
		}
            }

            if($this->getConfig()->get("tp-spawn-fall") === true) {
                if(!$entity instanceof Player) return;
                if($cause === EntityDamageEvent::CAUSE_FALL) {
                    $entity->teleport($entity->getWorld()->getSpawnLocation());
                    $event->cancel();	
		}
            }

            if($this->getConfig()->get("tp-spawn-lava") === true) {
                if(!$entity instanceof Player) return;
                if($cause === EntityDamageEvent::CAUSE_LAVA) {
                    $entity->teleport($entity->getWorld()->getSpawnLocation());
                    $event->cancel();	
		}
            }

            if($this->getConfig()->get("tp-spawn-drowning") === true) {
                if(!$entity instanceof Player) return;
                if($cause === EntityDamageEvent::CAUSE_DROWNING) {
                    $entity->teleport($entity->getWorld()->getSpawnLocation());
                    $event->cancel();	
		}
            }

            if($this->getConfig()->get("tp-spawn-explosion") === true) {
                if(!$entity instanceof Player) return;
                if($cause === EntityDamageEvent::CAUSE_BLOCK_EXPLOSION) {
                    $entity->teleport($entity->getWorld()->getSpawnLocation());
                    $event->cancel();
		}
            }

            if($this->getConfig()->get("tp-spawn-void") === true) {
                if(!$entity instanceof Player) return;
                if($cause === EntityDamageEvent::CAUSE_VOID) {
                    $entity->teleport($entity->getWorld()->getSpawnLocation());
                    $event->cancel();
		}
            }
	}
    }
}
