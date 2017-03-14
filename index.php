<!DOCTYPE html>
<html lang='nl'>

    <head>
        <title>Boter, Kaas en Eieren</title>

        <link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/bke.js"></script>

	<?php
//			include 'js/php/game.php';
//			include 'js/php/button.php';
//			include 'js/php/beurt.php';
//			include 'js/php/scores.php';
//			include 'js/php/round.php';
//			include 'js/php/speelveld.php';
//			include 'js/php/player.php';aaaaaaaaaaaa
//            include 'js/php/cells.php';
            //$Game = new Game;
            $GameVar = "";
			include 'js/php/stuff.php';

	?>
        <script> window.onload = function(){

            }</script>
    </head>

    <body>
        <div id="mainContainer">

            <h1>Boter, Kaas &amp; Eieren</h1>

            <div id="speelveld">
                <table border="0">
                    <tr>
                        <td><img alt="" title="" src="img/both.jpg" id="[0][0]" onclick="inTurn(this.id)"/></td> <!--rij[0][0]-->
                        <td><img alt="" title="" src="img/both.jpg" id="[0][1]" onclick="inTurn(this.id)"/></td> <!--rij[0][1]-->
                        <td><img alt="" title="" src="img/both.jpg" id="[0][2]" onclick="inTurn(this.id)"/></td> <!--rij[0][2]-->
                    </tr>
                    <tr>
                        <td><img alt="" title="" src="img/both.jpg" id="[1][0]" onclick="inTurn(this.id)"/></td> <!--rij[1][0]-->
                        <td><img alt="" title="" src="img/both.jpg" id="[1][1]" onclick="inTurn(this.id)"/></td> <!--rij[1][1]-->
                        <td><img alt="" title="" src="img/both.jpg" id="[1][2]" onclick="inTurn(this.id)"/></td> <!--rij[1][2]-->
                    </tr>
                    <tr>
                        <td><img alt="" title="" src="img/both.jpg" id="[2][0]" onclick="inTurn(this.id)"/></td> <!--rij[2][0]-->
                        <td><img alt="" title="" src="img/both.jpg" id="[2][1]" onclick="inTurn(this.id)"/></td> <!--rij[2][1]-->
                        <td><img alt="" title="" src="img/both.jpg" id="[2][2]" onclick="inTurn(this.id)"/></td> <!--rij[2][2]-->
                    </tr>
                </table>
            </div> <!-- EINDE SPEELVELD CONTAINER -->

            <div id="game-info">
                <h1>Aan beurt</h1>

                <table class="players-turn" border="0">
                    <tr>
                        <td><img width="25" height="25" alt="" title="" src="img/cross.jpg" id="PPTurn"/></td>
                        <td>Speler</td>
                        <td id ="PNTurn">1</td>
                    </tr>
                </table> <!-- EINDE SPELER AAN ZET TABEL -->
				<table class = "timers" border ="0">
					<tr class = "timer"><td>Totaal tijd</td><td class = "dp">:</td><td id ="SST"> tijd</td></tr>
					<tr class = "timer"><td>Ronde tijd</td><td class = "dp">:</td><td id ="RST"> tijd</td></tr>
					<tr class = "timer"><td>Beurt tijd</td><td class = "dp">:</td><td id ="BST"> tijd</td></tr>
                </table>
			   <h1>Scores</h1>

                <table class="rounds-info">
                    <tr>
                        <td><img width="15" height="15" alt="" title="" src="img/cross.jpg" />&nbsp;Speler 1</td>
                        <td id ="XScore">0</td>
                    </tr>
                    <tr>
                        <td><img width="15" height="15" alt="" title="" src="img/circle.jpg" />&nbsp;Speler 2</td>
                        <td id = "OScore">0</td>
                    </tr>
                    <tr>
                        <td>Aantal rondes</td>
                        <td id = "Round">0</td>
                    </tr>
                </table> <!-- EINDE INFO TABEL -->

                <button class="game-button" onclick="starting()">Start spel</button>

            </div> <!-- EINDE GAME-INFO CONTAINER -->

        </div> <!-- EINDE MAINCONTAINER -->
        <div id = "Insert-container"></div>
    </body>
    <script>
        turn = 4;
        function starting() {
                $.ajax({
                    url: 'js/php/stuff.php',
                    data: {action: 'ButtonClick'},
                    type: "POST",
                    success: function (x) {
                        $("#Insert-container").html(x);
                    }
                });
        }
        function start(){
            $.ajax({
                type: "POST",
                url: "js/php/stuff.php",
                data: {action:"Start"},
                success: function (x) {
                    $("#Insert-container").html(x);
                }
            });
        }

        function inTurn(ID){
            $.ajax({
                type: "POST",
                url: "js/php/stuff.php",
                data: {action:"ClickCell",Val:ID},
                success: function (x) {
                    $("#Insert-container").html(x);
                }
            });
        }
        //console.log(document.getElementsByTagName('body')[0].outerHTML);
    </script>
<?php

 ?>
</html>
