<?php
class Speelveld extends Game
{
    private $_Cells;

    public  function UnLockAllCel(){
        for($x=0;$x<9;$x++) {
            $this->_Cells[$x]->setLocked('false');
        }
    }

    public function LockAllCel(){
        for($x=0;$x<9;$x++) {
            $this->_Cells[$x]->setLocked('true');
        }
    }

    public function getLocked($a){
        return $this->_Cells[$a]->isLocked();
    }

    public function SetCell($a,$b,$c,$d){
        $this->_Cells[$c]->SetCell($a,$b,$d);
    }

    public function getCells(){
        for($x=0;$x<9;$x++){
            $xa[] = $this->_Cells[$x]->GetPlayer();
        }
        return $xa;
    }


    public function __construct()
    {
        for ($x = 0; $x < 9; $x++) {
            $this->_Cells[$x] = new Cells(); //volgens mij is dit correct
        }
    }

    public function ResetField(){
        for ($x = 0; $x < 9; $x++) {
            $this->_Cells[$x]->BlankCel($x);
        }
    }
}
?>