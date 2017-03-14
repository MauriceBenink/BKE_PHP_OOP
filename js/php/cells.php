<?php
class Cells extends Speelveld
{

    private $_Img = '';
    private $_Player = 3;
    private $_Locked = 'true';

    public function GetPlayer(){
        return $this->_Player;
    }

    public function __construct(){ //volgenmij klopt deze wel
        $this->_Img = "img/both";
        $this->_Player = 3;
        $this->_Locked = 'true';
    }

    public function setLocked($Locked)
    {
        $this->_Locked = $Locked;
    }

    public function isLocked()
    {
        return $this->_Locked;
    }

    public function setCell($a,$b,$c){
        $this->_Img = $a;
        $this->_Player = $b;
        echo "<script>document.getElementById('$c').src='$a' +'.jpg';</script>";
        $this->_Locked = 'true';
    }

    public function BlankCel($x){
        $this->_Player = 3;
        $this->_Img = "img/empty";
        echo "<script>document.getElementById('speelveld').getElementsByTagName('img')[$x].src='img/empty.jpg';</script>";
    }

}
?>