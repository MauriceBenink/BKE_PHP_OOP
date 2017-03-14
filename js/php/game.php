<?php
class Game
{

    private $_Speelveld;
    private $_Button;
    private $_Beurt;
    private $_Scores;
    private $_Round;
    private $_player1;
    private $_player2;

    public function __construct(){
        $this->Start();
    }

    public function Start(){
        $this->_Button = new Button();
        $this->_Beurt = new Beurt();
        $this->_Scores = new Scores();
        $this->_Round = new Round();
        $this->_Speelveld = new Speelveld();
        $this->_player1 = new Player("img/cross","0");
        $this->_player2 = new Player("img/circle","1");
    }

    public function ButtonClick()
    {
        if($this->_Button->getStarted()==0) {
            $this->_Button->setButton( 'Stop Spel' );
            $this->_Button->setStarted( 1 );
            $this->CleanField();
        }else {
            $this->_Button->setStarted( 0 );
            $this->_Button->setButton( 'reset Spel' );
            $this->_Speelveld->LockAllcel();
        }
    }



    public function CleanField(){

        $this->_Speelveld->UnlockAllcel();
        $this->_Speelveld->ResetField();
        $this->_Beurt->setTurn(0);
        $this->_Round->AddRound();
        $this->_Beurt->setBeurt(0);
    }

    public function ClickCell($Id){
        Switch($Id){
            case '[0][0]':
                $CN = 0;
                break;
            case '[0][1]':
                $CN = 1;
                break;
            case '[0][2]':
                $CN = 2;
                break;
            case '[1][0]':
                $CN = 3;
                break;
            case '[1][1]':
                $CN = 4;
                break;
            case '[1][2]':
                $CN = 5;
                break;
            case '[2][0]':
                $CN = 6;
                break;
            case '[2][1]':
                $CN = 7;
                break;
            case '[2][2]':
                $CN = 8;
                break;
        }
        if($this->_Speelveld->getLocked($CN)== 'false') {
            $PD = array($this->getCellsData()[0], $this->getCellsData()[1]);
            $this->_Speelveld->setCell( $PD[0], $PD[1], $CN, $Id );
            $this->WinCondition();
            $this->_Beurt->nextBeurt();
            $this->_Beurt->addTurn();
        }
    }

    public function WinCondition(){
        $controll =0;
        $C[0][0]=$this->_Speelveld->getCells()[0];
        $C[0][1]=$this->_Speelveld->getCells()[1];
        $C[0][2]=$this->_Speelveld->getCells()[2];
        $C[1][0]=$this->_Speelveld->getCells()[3];
        $C[1][1]=$this->_Speelveld->getCells()[4];
        $C[1][2]=$this->_Speelveld->getCells()[5];
        $C[2][0]=$this->_Speelveld->getCells()[6];
        $C[2][1]=$this->_Speelveld->getCells()[7];
        $C[2][2]=$this->_Speelveld->getCells()[8];

        for($x=0;$x<3;$x++) {
            if (($C[$x][0] == $C[$x][1] && $C[$x][0] != 3 && $C[$x][0] == $C[$x][2])) {
                $message = "Horizontaal Winst";
                echo "<script type='text/javascript'>alert('$message');</script>";

                $this->Addscore();
                $this->_Speelveld->LockAllCel();
                $this->_Button->setStarted( 0 );
                $controll = 1;
            }
            if (($C[0][$x] == $C[1][$x] && $C[0][$x] != 3 && $C[0][$x] == $C[2][$x])) {
                $message = "Vertical Winst";
                echo "<script type='text/javascript'>alert('$message');</script>";

                $this->Addscore();
                $this->_Speelveld->LockAllCel();
                $this->_Button->setStarted( 0 );
                $controll = 1;
            }
        }
        if(($C[0][0]==$C[1][1]&&$C[0][0]!=3&&$C[0][0]==$C[2][2])){
            $message = "Schuin Winst";
            echo "<script type='text/javascript'>alert('$message');</script>";

            $this->Addscore();
            $this->_Speelveld->LockAllCel();
            $this->_Button->setStarted(0);
            $controll = 1;

        }
        if(($C[0][2]==$C[1][1]&&$C[0][2]!=3&&$C[0][2]==$C[2][0])){
        $message = "Schuin Winst";
        echo "<script type='text/javascript'>alert('$message');</script>";

        $this->Addscore();
        $this->_Speelveld->LockAllCel();
        $this->_Button->setStarted(0);
            $controll = 1;

        }
        if(($this->_Beurt->getTurn())==8&&$controll == 0){
            $message = "Gelijk Spel";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $this->GelijkScore();
            $this->_Speelveld->LockAllCel();
            $this->_Button->setStarted(0);
        }
    }



    public function getCellsData(){

        if($this->_Beurt->getBeurt()==0) {

            return $this->_player1->getPlayerData();
        }else{
            return $this->_player2->getPlayerData();
        }
    }

    public function Addscore(){
        $asdfg = $this->_Beurt->getBeurt();
        $this->_Scores->wonRound($asdfg);
        $this->_Button->setButton('Nog een keer :D');
    }
    public function GelijkScore(){
        $this->_Scores->gelijkSpel();
        $this->_Button->setButton('Nog een keer :D');
    }
}
?>