<?php
class Hero {

  private $name;
  private $healthMax;
  private $health;
  private $manaMax;
  private $mana;
  private $items;
  private $class;
  private $gold;
  private $level;
  private $experience;
  private $status;

  public function __construct(string $name, int $healthMax, int $manaMax, string $class = 'Warrior', $status = ''){
    $this->name = $name;
    $this->healthMax = $healthMax;
    $this->health = $healthMax;
    $this->manaMax = $manaMax;
    $this->mana = $manaMax;
    $this->items = [];
    $this->class = $class;
    $this->gold = 0;
    $this->level = 1;
    $this->experience = 0;
    $this->status = $status;
  }

  public function getName() {
    return $this->name;
  }

  public function getHealthMax() {
    return $this->healthMax;
  }

  public function getHealth() {
    return $this->health;
  }

  public function getManaMax() {
    return $this->manaMax;
  }

  public function getMana() {
    return $this->mana;
  }

  public function getItems() {
    return $this->items;
  }

  public function getClass() {
    return $this->class;
  }

  public function getGold() {
    return $this->gold;
  }

  public function getLevel() {
    return $this->level;
  }

  public function getExperience() {
    return $this->experience;
  }

  public function getStatus() {
    return $this->status;
  }


  public function valueHealth($n) {
    $this->health = $this->health + $n;

    if ($this->health <= 0) {
      $this->health = 0;
    }
  }

  public function valueMana($n) {
    $this->mana = $this->mana + $n;

    if ($this->mana <= 0) {
      $this->mana = 0;
    }
  }

  public function valueGold($n) {
    $this->gold = $this->gold + $n;

    if ($this->gold <= 0) {
      $this->gold = 0;
    }
  }

  public function setLevel($n) {

    $this->experience = $this->experience + $n;
    while ($n > pow(2, $this->level)) {
      $this->level = $this->level + 1;
      $this->healthMax = $this->healthMax + 10;
      $this->manaMax = $this->manaMax + 5;
      $this->health = $this->health + 10;
      $this->mana = $this->mana + 5;

      if ($this->level > 18) {
        $this->level = 18;
        $this->experience = "max";
        $this->healthMax = $this->healthMax - 10;
        $this->manaMax = $this->manaMax - 5;
        $this->health = $this->health - 10;
        $this->mana = $this->mana - 5;
        break;
      }
    }
  }

  public function setStatus() {

    if ($this->health == 0) {
      $statusHero = false;

    } else {
      $statusHero = true;
    }

    if ($this->class == "Mage") {

      if ($this->mana == 0) {
        $statusHero = false;
      }
    }

    if ($statusHero == false) {
      $this->status = "Die";

    } if ($statusHero == true) {
      $this->status = "";
    }
  }

  public function itemsShop($selectItem) {

    if ($this->gold >= $selectItem->getPrice()) {
      $this->items[] = [$selectItem->getName(), $selectItem->getPrice()];
      $this->gold = $this->gold - $selectItem->getPrice();
    }
  }

  public function backpackItems() {

    foreach ($this->items as $i => $j) {
      $backpackItems[$i] = $this->items[$i][0];
    }

    return $backpackItems;
  }

  public function timerResurrection() {

    if ($this->status == "Die") {
      $this->health = $this->healthMax;
      $this->mana = $this->manaMax;
      $this->status = "";
    }
  }
}
?>
