<?php
class Beurt extends Game{

    private $_Beurt;
    private $_Turn;

    public function __construct(){
        $this->_Beurt = 0;
        $this->_Turn = 1;
    }

    public function getBeurt()
    {
        return $this->_Beurt;
    }
    public function setBeurt($Beurt){
        $this->_Beurt = $Beurt;
        echo "<script type='text/javascript'>document.getElementById('PNTurn').innerHTML = $Beurt+1</script>";
        if($Beurt == 0){
            echo "<script type='text/javascript'>document.getElementById('PPTurn').src='img/cross.jpg';</script>";
        } else {
            echo "<script type='text/javascript'>document.getElementById('PPTurn').src='img/circle.jpg';</script>";
        }
    }

    public function nextBeurt(){
        if($this->_Beurt == 1) {
            $this->_Beurt = 0;
            echo "<script type='text/javascript'>
                document.getElementById('PPTurn').src='img/cross.jpg';
				document.getElementById('PNTurn').innerHTML = 1;
                  </script>";
        } else {
            $this->_Beurt = 1;
            echo "<script type='text/javascript'>
                document.getElementById('PPTurn').src='img/circle.jpg';
				document.getElementById('PNTurn').innerHTML = 2;
                  </script>";
        }
    }
    public function getTurn(){
        $nop = $this->_Turn;
        return $this->_Turn;
    }

    public function setTurn($Turn){
        $this->_Turn = $Turn;
    }

    public function addTurn(){
        $this->_Turn = $this->_Turn+1;
        $nop = $this->_Turn;
    }


}

?>