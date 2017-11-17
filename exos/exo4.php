<?php
require_once '../inc/functions.php';

/*
 * Exo 4 : Luigi To The Rescue
 *
 * Luigi: Hi!
 * It seems like Mario is in trouble. I'm here to help!
 *
 * But, you know, Mario is my brother. I don't think we should have
 * a Mario class, and a Luigi class. Maybe, we can just pass our firstname
 * when we create the object?
 *
 * Oh, and I saw this is not programmed yet, but I want to say my punchline!
 *
 * For example, we should be able to use the class this way:
 *      $mario = new Hero('Mario');
 *      echo $mario->hello(); // Display: "It’s me, Mario!"
 *      $mario->takeHit();
 *      $mario->up();
 *      $mario->takeHit();
 *      echo $mario->getLives(); // Display: 2
 *
 *      $luigi = new Hero('Luigi');
 *      echo $luigi->hello(); // Display: "It's me, Luigi!"
 *      $luigi->up();
 *      $luigi->up();
 *      $luigi->takeHit();
 *      echo $luigi->getLives(); // Display: 4
 */

class Hero
{
  private $name;
  private $lives;

  // Constructeur par défaut
  public function __construct($name) {
    // Nom du Héro à passer en paramètre du constructeur
    $this->name = $name;
    // Le nombre de vie de base est '3'
    $this->lives = 3;
  }

  // Retourne une phrase contenant le nom du Héro
  public function hello() {
    return 'It\'s me, '.$this->name.'!';
  }

  // Getter $lives
  public function getLives() {
    return $this->lives;
  }

  // Le Héro prend un coup
  public function takeHit() {
    $this->lives--;
  }

  // Le Héro mange un champignon vert
  public function up() {
    $this->lives++;
  }
}







/*
 * Tests
 * Pas touche !
 */
$mamie = new Hero('Mamie PHP');
displayExo(4, method_exists($mamie, 'hello') && $mamie->hello() === "It's me, Mamie PHP!");
