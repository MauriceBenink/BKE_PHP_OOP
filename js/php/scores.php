<?php
class Scores extends Game{
    private $_ScoreP1 = 0;
    private $_ScoreP2 = 0;

    public function __construct(){
        $this->_ScoreP1 = 0;
        $this->_ScoreP2 = 0;
    }

    public function getScoreP1()
    {
        return $this->_ScoreP1;
    }

    public function getScoreP2()
    {
        return $this->_ScoreP2;
    }

    public function wonRound($a){
        switch($a){
            case 0: $this->_ScoreP1 = $this->_ScoreP1 +2;
                break;
            case 1: $this->_ScoreP2 = $this->_ScoreP2 +2;
                break;
        }
        $this->UpdateScore();
    }

    public function gelijkSpel(){
        $this->_ScoreP1 = $this->_ScoreP1 + 1;
        $this->_ScoreP2 = $this->_ScoreP2 + 1;
        $this->UpdateScore();
    }

    public function UpdateScore(){
        echo "<script type='text/javascript'>
                    document.getElementById('XScore').innerHTML='$this->_ScoreP1';
                    document.getElementById('OScore').innerHTML='$this->_ScoreP2';
              </script>";
    }
}

?>