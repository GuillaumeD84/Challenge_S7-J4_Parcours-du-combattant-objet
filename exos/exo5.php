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

  private $lives;
  private $isBig;
  private $invincible;

  public function __construct($name, $favColor) {
    $this->name = $name;
    $this->favColor = $favColor;

    $this->lives = 3;
    $this->isBig = false;
    $this->invincible = false;
  }

  public function hello() {
    return 'It\'s me, '.$this->name.'!';
  }

  public function getLives() {
    return $this->lives;
  }

  public function getColor() {
    return $this->favColor;
  }

  public function takeHit() {
    if (!$this->invincible) {
      if ($this->isBig) {
        $this->isBig = false;
      }
      else {
        $this->lives--;
      }
    }
  }

  public function up() {
    $this->lives++;
  }

  public function isBig() {
    return $this->isBig;
  }

  public function hasStar() {
    return $this->invincible;
  }

  public function eatMushroom() {
    $this->isBig = true;
  }

  public function receiveStar() {
    $this->invincible = true;
  }

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
