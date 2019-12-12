<?php

class Blackjack {

    public $score;

    public function __construct($score) {
        $this->score = $score;
    }

    public function initGame(){
        $this->score += rand(1, 11) + rand(1, 11);
    }

    public function stand(){

    }
    public function surrender(){

    }
};

class Player extends Blackjack {

    public $name;

    public function __construct($score, $name) {
        $this->name = $name;
        parent::__construct($score);
    }

    public function hit() {
        $this->score += rand(1, 11);
    }

    public function stand(){
        dealerTurn($dealer->score, $this->score);
    }
};

class Dealer extends Blackjack {

    public function __construct($score) {
        parent::__construct($score);
    }
    public function stand(){
        echo($this->score);
    }
};


function dealerTurn($dealerScore, $playerScore){

    if ($dealerScore < 18) {
        $dealer->hit();
    } else if ($dealerScore >= 18 && $dealerScore < $playerScore){
        $dealer->hit();
    } else {
        $dealer->stand();
    }
};
?>