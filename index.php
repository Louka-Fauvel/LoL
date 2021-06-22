<?php
include 'Hero.php';


function joueur($joueur, $equipe) {

  if ($equipe == "votreJoueur") {
    $joueur->systemLV(20);
    $joueur->systemPV(-150);
    $joueur->systemMana(-10);
    $joueur->systemPO(10);
    $joueur->systemPV(0);
    $joueur->itemsShop(2);
    $joueur->systemLV(200);

    $heroDie = $joueur->heroDie();
    echo "      <h3 class='equipe_vert'>Vous <span class='dead'>$heroDie</span></h3>";
    echo "      <p>Votre Héros se nomme <b>".$joueur->getName()."</b></p>";
  }

  if ($equipe == "equipeAllie") {
    $joueur->systemLV(20);
    $joueur->systemPV(-15);
    $joueur->systemMana(-50);
    $joueur->systemPO(5);
    $joueur->itemsShop(1);

    $heroDie = $joueur->heroDie();
    echo "      <h3 class='equipe_bleu'>Allié <span class='dead'>$heroDie</span></h3>";
    echo "      <p>Son Héros se nomme ".$joueur->getName()."</p>";
  }

  if ($equipe == "equipeEnnemi") {
    $joueur->systemLV(20);
    $joueur->systemPV(-15);
    $joueur->systemMana(-50);
    $joueur->systemPO(5);
    $joueur->itemsShop(1);

    $heroDie = $joueur->heroDie();
    echo "       <h3 class='equipe_rouge'>Ennemi <span class='dead'>$heroDie</span></h3>";
    echo "       <p>Son Héros se nomme <b>".$joueur->getName()."</b></p>";
  }

  echo "      <p><a class='pv'>".$joueur->getPV()."/".$joueur->getPVMax()."</a> PV</p>";
  echo "      <p><a class='mana'>".$joueur->getMana()."/".$joueur->getManaMax()."</a> de mana</p>";
  echo "      <p>".join(", ", $joueur->getItems())."&nbsp;</p>";
  echo "      <p>Classe : ".$joueur->getClass()."</p>";
  echo "      <p>".$joueur->getPO()." PO</p>";
  echo "      <p>Niveau ".$joueur->getLV()." et ".$joueur->getExp()." exp</p>";
}

$joueurPrincipal = new Hero("Akou", 100, 20, "Mage"); // Collier de flamme
$joueurEnnemi = new Hero("Léonidas", 100, 20); // Bouclier
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
          <?php joueur($joueurPrincipal, "votreJoueur"); ?>
        </td>
        <td>
          <div class='position_inverse'>
            <?php joueur($joueurEnnemi, "equipeEnnemi"); ?>
          </div>
        </td>
      </tr>
    </table>
  </body>
</html>
