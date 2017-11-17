<?php
require_once '../inc/functions.php';

/*
 * Exo 5 : Full Mario!
 *
 * Add these to the Hero class:
 *  - A favorite color.
 *  - To be able to grow when eat a mushroom. Shrink instead of die when taking a hit.
 *  - To be able to be invicible when eat a star.
 *
 * See tests for more info :)
 */

class Hero
{
  private $name;
  private $favColor;

  // Nombre de vie du Héro
  private $lives;
  // Taille du Héro
  private $isBig;
  // Etat du Héro (vulnérable ou insensible aux dégâts)
  private $invincible;

  // Constructeur par défaut
  public function __construct($name, $favColor) {
    // Nom du Héro à passer en paramètre du constructeur
    $this->name = $name;
    // Couleur favorite du Héro à passer en paramètre du constructeur
    $this->favColor = $favColor;

    // Le nombre de vie de base est '3'
    $this->lives = 3;
    // Le Héro n'est pas 'grand' par défaut
    $this->isBig = false;
    // Le Héro n'est pas invincible par défaut
    $this->invincible = false;
  }

  // Retourne une phrase contenant le nom du Héro et sa couleur favorite
  public function hello() {
    return 'It\'s me, '.$this->name.'! I love '.$this->favColor.'!';
  }

  // Getter $lives
  public function getLives() {
    return $this->lives;
  }

  // Getter $favColor
  public function getColor() {
    return $this->favColor;
  }

  // Le Héro prend un coup
  public function takeHit() {
    // Si le Héro est invincible il est insensible aux dégâts
    if (!$this->invincible) {
      // S'il est gros, il redevient petit
      if ($this->isBig) {
        $this->isBig = false;
      }
      // S'il n'était pas gros, il perd une vie
      else {
        $this->lives--;
      }
    }
  }

  // Le Héro mange un champignon vert
  public function up() {
    $this->lives++;
  }

  // Getter $isBig
  public function isBig() {
    return $this->isBig;
  }

  // Getter $invincible
  public function hasStar() {
    return $this->invincible;
  }

  // Le Héro mange un champignon rouge
  public function eatMushroom() {
    $this->isBig = true;
  }

  // Le Héro attrape une étoile
  public function receiveStar() {
    $this->invincible = true;
  }

  // Le Héro perd l'effet de l'étoile
  public function vanishStar() {
    $this->invincible = false;
  }
}

// Test de la classe
// $mario = new Hero('Mario', 'red');
//
// echo 'red === ? '.$mario->getColor(); // === 'red'
// echo '<br>';
// echo 'false === ? '.($mario->isBig() ? 'true' : 'false'); // === false
// echo '<br>';
// echo 'false === ? '.($mario->hasStar() ? 'true' : 'false'); // === false
// echo '<br>';
// echo '3 === ? '.$mario->getLives(); // === 3
// echo '<br><br>';
//
// $mario->eatMushroom();
// echo 'true === ? '.($test = $mario->isBig() ? 'true' : 'false'); // === true;
// echo '<br><br>';
//
// $mario->takeHit();
// echo 'false === ? '.($mario->isBig() ? 'true' : 'false'); // === false
// echo '<br>';
// echo '3 === ? '.$mario->getLives(); // === 3
// echo '<br><br>';
//
// $mario->receiveStar();
// echo 'true === ? '.($test = $mario->hasStar() ? 'true' : 'false'); // === true;
// echo '<br><br>';
//
// $mario->takeHit();
// $mario->takeHit();
// $mario->up();
// $mario->vanishStar();
// echo '4 === ? '.$mario->getLives(); // === 4
// echo '<br>';
// echo 'false === ? '.($mario->hasStar() ? 'true' : 'false'); // === false
// echo '<br>';



/*
 * Tests
 * Pas touche !
 */
$mario = new Hero('Mario', 'red');
$test = (
    $mario->getColor() === 'red'
    && $mario->isBig() === false
    && $mario->hasStar() === false
    && $mario->getLives() === 3
);
if ($test) {
    $mario->eatMushroom();
    $test = $mario->isBig() === true;
    if ($test) {
        $mario->takeHit();
        $test = (
            $mario->isBig() === false
            && $mario->getLives() === 3
        );
        if ($test) {
            $mario->receiveStar();
            $test = $mario->hasStar() === true;
            if ($test) {
                $mario->takeHit();
                $mario->takeHit();
                $mario->up();
                $mario->vanishStar();
                $test = (
                    $mario->getLives() === 4
                    && $mario->hasStar() === false
                );
            }
        }
    }
}
displayExo(5, $test);
