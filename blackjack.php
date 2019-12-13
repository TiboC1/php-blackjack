<?php

class Blackjack {

    public $score;

    public function __construct($score) {
        $this->score = $score;
    }

    public function initGame(){
        $this->score += rand(1, 11) + rand(1, 11);
    }
    public function hit() {
        $this->score += rand(1, 11);
    }
    public function surrender($player, $dealer){
        $player->score = 0;
        $dealer->score = 0;
        $player->initGame();
        $dealer->initGame();

    }
};

class Player extends Blackjack {

    public $name;

    public function __construct($score, $name) {
        $this->name = $name;
        parent::__construct($score);
    }

    public function stand($dealer, $player){
       return dealerTurn($dealer, $player);
    }
};

class Dealer extends Blackjack {

    public function __construct($score) {
        parent::__construct($score);
    }
    public function stand(){

    }
};


function dealerTurn($dealer, $player){
    $dealerScore = $dealer->score;
    $playerScore = $player->score;

    while ($dealerScore < 18) {
        $dealerScore += rand(1, 11);
    }
    while ($dealerScore >= 18 && $dealerScore < $playerScore){
        $dealerScore += rand(1, 11);
    }
    $dealer->stand();
    return $dealerScore;

};
?>