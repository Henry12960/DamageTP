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
        $entity-> $event->getEntity();
        $cause = $event->getCause();
        $world = $entity->getWorld();
        $worldName = $world->getFolderName();
# ================================================          
        $suffocationTP = $this->getConfig()->get("suffocation-tp-mode");
        $voidTP = $this->getConfig()->get("void-tp-mode");
        $projectileTP = $this->getConfig()->get("projectile-tp-mode");
        $lavaTP = $this->getConfig()->get("lava-tp-mode");
        $fallTP = $this->getConfig()->get("fall-tp-mode");
        $drowningTP = $this->getConfig()->get("drowning-tp-mode");
# ================================================
        if(in_array($worldName, $this->getConfig()->get("damage-tp-worlds", []))) {
            if (!$entity instanceof Player) {

# ====================
#  CAUSE SUFFOCATION
# ====================  

                if($this->getConfig()->get("tp-suffocation-damage") === true) {
                    if($cause === EntityDamageEvent::CAUSE_SUFFOCATION) {
                        if($suffocationTP === "worldspawn") {
                            $entity->teleport($entity->getWorld()->getSpawnLocation());
                            $event->cancel();
                        }

                        if($suffocationTP === "defspawn") {
                            $entity->teleport($this->getServer()->getWorldManager()->getDefaultWorld()->getSpawnLocation());
                            $event->cancel();
                        }
                    }
                }
# ====================
#     CAUSE VOID
# ==================== 

                if($this->getConfig()->get("tp-void-damage") === true) {
                    if($cause === EntityDamageEvent::CAUSE_VOID) {
                        if($voidTP === "worldspawn") {
                            $entity->teleport($entity->getWorld()->getSpawnLocation());
                            $event->cancel();
                        }

                        if($voidTP === "defspawn") {
                            $entity->teleport($this->getServer()->getWorldManager()->getDefaultWorld()->getSpawnLocation());
                            $event->cancel();
                        }
                    }
                } 
                
# ====================
#   CAUSE PROJECTILE
# ==================== 

                if($this->getConfig()->get("tp-projectile-damage") === true) {
                    if($cause === EntityDamageEvent::CAUSE_PROJECTILE) {
                        if($projectileTP === "worldspawn") {
                            $entity->teleport($entity->getWorld()->getSpawnLocation());
                            $event->cancel();
                        }

                        if($projectileTP === "defspawn") {
                            $entity->teleport($this->getServer()->getWorldManager()->getDefaultWorld()->getSpawnLocation());
                            $event->cancel();
                        }
                    }
                }
                
# ====================
#     CAUSE FALL
# ==================== 

                if($this->getConfig()->get("tp-fall-damage") === true) {
                    if($cause === EntityDamageEvent::CAUSE_FALL) {
                        if($fallTP === "worldspawn") {
                            $entity->teleport($entity->getWorld()->getSpawnLocation());
                            $event->cancel();
                        }

                        if($fallTP === "defspawn") {
                            $entity->teleport($this->getServer()->getWorldManager()->getDefaultWorld()->getSpawnLocation());
                            $event->cancel();
                        }
                    }
                }
                
# ====================
#    CAUSE DROWNING
# ==================== 

                if($this->getConfig()->get("tp-drowning-damage") === true) {
                    if($cause === EntityDamageEvent::CAUSE_DROWNING) {
                        if($drowningTP === "worldspawn") {
                            $entity->teleport($entity->getWorld()->getSpawnLocation());
                            $event->cancel();
                        }

                        if($drowningTP === "defspawn") {
                            $entity->teleport($this->getServer()->getWorldManager()->getDefaultWorld()->getSpawnLocation());
                            $event->cancel();
                        }
                    }
                }                 
            }     
        }
    }
}