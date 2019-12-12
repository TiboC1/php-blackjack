<?php

//starting session
session_start();

// importing blackjack class
require "blackjack.php";

// Instantiating player and dealer

if(!isset($_SESSION["player"])){
    $player = new Player(0, "Tibo");
    $player->initGame();
    $_SESSION["playerScore"] = $player->score;

    $dealer = new Dealer(0);
    $dealer->initGame();
    $_SESSION["dealerScore"] = $dealer->score;
}



// saving instances to session


$_SESSION["player"] = $player;
$_SESSION["dealer"] = $dealer;


if(isset($_POST["submit"]))
{
   $player->hit();
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>game</title>
</head>
<body>

<h1>Blackjack</h1>

<!--Player side -->
<div class="player">
    <h2><?php echo $player->name ?></h2>
    <p class="score"><?php 
        if(!isset($_SESSION["playerScore"])){
        
            echo("Your score is $player->score");
        } else {
            echo "Your score is " . $_SESSION["playerScore"];
        }
     ?></p>
</div>

<!--Dealer side -->

<div class="player">
    <h2>Dealer</h2>
    <p class="score"><?php echo "Your score is $dealer->score"; ?></p>
    <form action="game.php">
        <input type="submit" name="submit">
    </form>

</div>
    
</body>
</html>