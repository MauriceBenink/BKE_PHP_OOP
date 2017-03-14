<?php
class Round extends Game{

    public $_Round;

    public function __construct(){
        $this->_Round = 0;
    }
    public function getRound()
    {
        return $this->_Round;
    }
    public function addRound()
    {
        $this->_Round++;
        echo "<script type='text/javascript'>document.getElementById('Round').innerHTML = '$this->_Round';</script>";
    }
}

?>