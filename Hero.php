<<<<<<< HEAD

<?php
class Hero {

  private $name;
  private $pvMax;
  private $pv;
  private $manaMax;
  private $mana;
  private $items;
  private $class;
  private $po;
  private $lv;
  private $exp;

  public function __construct(string $name, int $pvMax, int $manaMax, string $class = 'Warrior'){
    $this->name = $name;
    $this->pvMax = $pvMax;
    $this->pv = $pvMax;
    $this->manaMax = $manaMax;
    $this->mana = $manaMax;
    $this->items = [];
    $this->class = $class;
    $this->po = 0;
    $this->lv = 1;
    $this->exp = 0;
  }

  public function getName() {
    return $this->name;
  }

  public function getPVMax() {
    return $this->pvMax;
  }

  public function getPV() {
    return $this->pv;
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

  public function getPO() {
    return $this->po;
  }

  public function getLV() {
    return $this->lv;
  }

  public function getExp() {
    return $this->exp;
  }


  public function systemPV($n) {
    $this->pv = $this->pvMax + $n;

    if ($this->pv <= 0) {
      $this->pv = 0;
    }
  }

  public function systemMana($n) {
    $this->mana = $this->manaMax + $n;

    if ($this->mana <= 0) {
      $this->mana = 0;
    }
  }

  public function systemPO($n) {
    $this->po = $this->po + $n;

    if ($this->po <= 0) {
      $this->po = 0;
    }
  }

  public function systemLV($n) {
    //$this->lv = floor($n / 10) + 1;
    $this->exp = $this->exp + $n;
    while ($n > pow(2, $this->lv)) {
      $this->lv = $this->lv + 1;
      $this->pvMax = $this->pvMax + 10;
      $this->manaMax = $this->manaMax + 5;
      $this->pv = $this->pv + 10;
      $this->mana = $this->mana + 5;

      if ($this->lv > 18) {
        $this->lv = 18;
        $this->exp = "max";
        $this->pvMax = $this->pvMax - 10;
        $this->manaMax = $this->manaMax - 5;
        $this->pv = $this->pv - 10;
        $this->mana = $this->mana - 5;
        break;
      }
    }
  }

  public function heroDie() {

    if ($this->pv == 0) {
      $die = "Dead";

    } else {
      $die = "";
    }

    if ($this->class == "Mage") {

      if ($this->mana == 0) {
        $die = "Dead";
      }
    }

    return $die;
  }

  public function itemsShop($select) {
    $itemsShop = [['Collier de flamme', 5], ['Bouclier', 5], ['Hache des Ténèbres', 8]];

    if ($select >= count($itemsShop) - 1) {
      $select = count($itemsShop) - 1;
    }

    if ($this->po >= $itemsShop[$select][1]) {
      $this->items[] = $itemsShop[$select][0];
      $this->po = $this->po - $itemsShop[$select][1];
    }
  }

  public function timerResurrection($die) {
    if ($die == "Dead") {
      // code...
    }
  }
}
?>
=======

>>>>>>> 1c5546110aca48c285c465bd802835666b213a24
