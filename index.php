<?php
include 'Item.php';
include 'Hero.php';


function player($player, $team) {
  $flameNecklace = new Item('Flame Necklace', 5);
  $shield = new Item('Shield', 5);
  $axOfDarkness = new Item('Ax of Darkness', 8);

  if ($team == "yourPlayer") {
    $player->setLevel(20);
    $player->valueHealth(-150);
    $player->valueMana(-10);
    $player->valueGold(10);

    $player->setStatus();
    $player->timerResurrection();

    $player->itemsShop($axOfDarkness);
    $player->itemsShop($flameNecklace);
    $player->setLevel(200);

    $player->setStatus();
    echo "      <h3 class='team_green'>You <span class='dead'>".$player->getStatus()."</span></h3>";
    echo "      <p>Your Hero is called <b>".$player->getName()."</b></p>";
  }

  if ($team == "teamAlly") {
    $player->setLevel(20);
    $player->valueHealth(-15);
    $player->valueMana(-50);
    $player->valueGold(5);
    $player->itemsShop($shield);

    $player->setStatus();
    echo "      <h3 class='team_blue'>Ally <span class='dead'>".$player->getStatus()."</span></h3>";
    echo "      <p>His Hero is called <b>".$player->getName()."</b></p>";
  }

  if ($team == "teamEnnemy") {
    $player->setLevel(20);
    $player->valueHealth(-15);
    $player->valueMana(-50);
    $player->valueGold(5);
    $player->itemsShop($shield);

    $player->setStatus();
    echo "       <h3 class='team_red'>Ennemy <span class='dead'>".$player->getStatus()."</span></h3>";
    echo "       <p>His Hero is called <b>".$player->getName()."</b></p>";
  }

  echo "      <p><a class='health'>".$player->getHealth()."/".$player->getHealthMax()."</a> HP</p>";
  echo "      <p><a class='mana'>".$player->getMana()."/".$player->getManaMax()."</a> mana</p>";
  echo "      <p>&nbsp;".join(", ", $player->backpackItems())."&nbsp;</p>";
  echo "      <p>Class : ".$player->getClass()."</p>";
  echo "      <p>".$player->getGold()." Gold</p>";
  echo "      <p>Level ".$player->getLevel()." and ".$player->getExperience()." XP</p>";
}

$playerMain = new Hero("Akou", 100, 20, "Mage");
$playerEnnemy = new Hero("Léonidas", 100, 20);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LoL</title>
    <link href="index.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <table>
      <tr>
        <td>
          <?php player($playerMain, "yourPlayer"); ?>
        </td>
        <td>
          <div class='position_reverse'>
            <?php player($playerEnnemy, "teamEnnemy"); ?>
          </div>
        </td>
      </tr>
    </table>
  </body>
</html>
