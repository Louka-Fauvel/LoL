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

  public function __construct(string $name, int $healthMax, int $manaMax, string $class = 'Warrior'){
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


  public function setHealth($n) {
    $this->health = $this->health + $n;

    if ($this->health <= 0) {
      $this->health = 0;
    }
  }

  public function setMana($n) {
    $this->mana = $this->mana + $n;

    if ($this->mana <= 0) {
      $this->mana = 0;
    }
  }

  public function setGold($n) {
    $this->gold = $this->gold + $n;

    if ($this->gold <= 0) {
      $this->gold = 0;
    }
  }

  public function setLevel($n) {
    //$this->level = floor($n / 10) + 1;
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

  public function setStatus($statusHero) {

    if ($statusHero == true) {
      $this->status = "Die";

    } if ($statusHero == false) {
      $this->status = "";
    }
  }

  public function heroDie() {

    if ($this->health == 0) {
      return true;

    } else {
      return false;
    }

    if ($this->class == "Mage") {

      if ($this->mana == 0) {
        return true;
      }
    }
  }

  public function itemsShop($selectItem) {

    if ($this->gold >= $selectItem->getPriceItem()) {
      $this->items[] = $selectItem->getNameItem();
      $this->gold = $this->gold - $selectItem->getPriceItem();
    }
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
