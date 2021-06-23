<?php
class Item {
  private $name;
  private $price;

  public function __construct(string $name, int $price) {
    $this->name = $name;
    $this->price = $price;
  }


  public function getNameItem() {
    return $this->name;
  }

  public function getPriceItem() {
    return $this->price;
  }
}
?>
