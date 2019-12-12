<?php



function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

// importing blackjack class
require "blackjack.php";

//starting session
session_start();

// Instantiating player and dealer

if(!isset($_SESSION["player"])){
    $player = new Player(0, "Tibo");
    $player->initGame();
    $_SESSION["playerScore"] = $player->score;
    $_SESSION["player"] = $player;

    $dealer = new Dealer(0);
    $dealer->initGame();
    $_SESSION["dealerScore"] = $dealer->score;
    $_SESSION["dealer"] = $dealer;

} else {
    $player = $_SESSION['player'];
    $dealer = $_SESSION['dealer'];
};



// saving instances to session



whatIsHappening();

if(isset($_POST["submit"]))
{
    echo("lol");
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
       echo $player->score
     ?></p>
</div>

<!--Dealer side -->

<div class="player">
    <h2>Dealer</h2>
    <p class="score"><?php 
        if(!isset($_SESSION["dealerScore"])){
        
            echo("Your score is $dealer->score");
        } else {
            echo "Your score is " . $_SESSION["dealerScore"];
        }
    ?></p>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <button type="submit" name="submit">HIT</button>
    </form>

</div>
    
</body>
</html>