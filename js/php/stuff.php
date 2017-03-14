<?php
include 'game.php';
include 'button.php';
include 'beurt.php';
include 'scores.php';
include 'round.php';
include 'speelveld.php';
include 'player.php';
include 'cells.php';
session_start();
if(isset($_SESSION["game"])){
    $_SESSION["game"];
}

if(!isset($_POST['action']) && empty($_POST['action'])){
    $_SESSION["game"] = new Game();
}

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    if (isset($_POST['Val']) && !empty($_POST['Val'])) {
        $Val = $_POST['Val'];
    }
    switch ($action) {
        case 'Start' :
            $_SESSION["game"] = new Game();
            break;
        case 'ButtonClick':
            $_SESSION["game"]->ButtonClick();
            break;
        case 'ButtonClickStop' :
            $_SESSION["game"]->ButtonClickStop();
            break;
        case 'ClickCell' :
            $_SESSION["game"]->ClickCell( $Val );
            break;
        // ...etc...
    }
}
//	if($_POST['Game'] == 'ClickCell(ID);') {
//		$Game->ClickCell(ID);
//	}
?>