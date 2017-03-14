<?php
class Player extends Game{

    private $_img;
    private $_value;


    public function __construct($a,$b){
        $this->_img = $a;
        $this->_value = $b;
    }

    public function getPlayerData(){
        return array($this->getImg(),$this->getValue());
    }

    public function getImg()
    {
        return $this->_img;
    }


    public function getValue()
    {
        return $this->_value;
    }
}

?>