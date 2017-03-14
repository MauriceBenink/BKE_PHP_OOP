<?php
class Button extends Game
{
    private $_Started;
    private $_Button = 'Start Spel';

    public function __construct(){
        $this->_Started = 0;
        $this->_Button = 'Start Spel';
    }

    public function setStarted($Started)
    {
        $this->_Started = $Started;
    }

    public function setButton($Button)
    {
        $this->_Button = $Button;
        echo "<script type='text/javascript'>document.getElementsByClassName('game-button')[0].innerHTML='$Button';</script>";
    }

    public function getButton()
    {
        return $this->_Button;
    }

    public function getStarted()
    {
        return $this->_Started;
    }

}


?>