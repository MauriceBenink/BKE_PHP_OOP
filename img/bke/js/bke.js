/***************************************************
 * bke.js
 * -------------------------------------------------
 * In dit bestand staat alle javascript code
 * om ons spel te laten werken.
 *
 **************************************************/
 
/*  speler 0 = X dus 1
	speler 1 = O dus 2
*/
	var player = 0;
	var rij = [[3,3,3],[3,3,3],[3,3,3]];
	var turn = 0;
	var beurt = 1;
	var start = 0;
	var SSTijd = 0;
	var BSTijd = 0;
	var RSTijd = 0;
	var Spauze = 0;
	var Rpauze = 0;
	var Bpauze = 0;
	var Scheck = 0;
	var Bcheck = 0;
	var Rcheck = 0;
	SSTijd = setInterval(function(){TIMERSST()},100);
	BSTijd = setInterval(function(){TIMERBST()},100);
	RSTijd = setInterval(function(){TIMERRST()},100);
	var round = 0;
	var score = 0;
	var Xscore = 0;
	var Oscore = 0;
	
function TIMERSST(){
	if(Scheck == 0){
		++Scheck;
		SSTijd = 0;
	}
	document.getElementById("SST").innerHTML = (SSTijd/10).toFixed(1);
	++SSTijd;
}
function TIMERRST(){
	if(round!=0&&Rpauze != 1){
		if(Rcheck == 0){
			++Rcheck;
			RSTijd = 0;
	}
		document.getElementById("RST").innerHTML = (RSTijd/10).toFixed(1);
		++RSTijd;
	}
}
function TIMERBST(){
	if(turn!=0&&Bpauze != 1){
		if(Bcheck == 0){
			++Bcheck;
			BSTijd = 0;
		}
		document.getElementById("BST").innerHTML = (BSTijd/10).toFixed(1);
		++BSTijd;
	}
}

function started (){
	if(start === 1 ) {
		return true
	}else {return false}
}
function starting() {
	if (start == 0){
		start = 1;
		if(round == 0){
	}
	document.getElementsByClassName("game-button")[0].innerHTML = "Stop spel";
	rij = [[3,3,3],[3,3,3],[3,3,3]];
	turn = 0;
	player = 0;
	
	document.getElementById("PPTurn").src="img/cross.jpg";
	document.getElementById("PNTurn").innerHTML = 1;
	for(x=0;x<=2;++x){
		for(y=0;y<=2;++y){
			document.getElementById("["+x+"]["+y+"]").src="img/empty.jpg";
		}
	}
	++round;
	Rpauze = 0;
	Bpauze = 0;
	document.getElementById("BST").innerHTML = (0).toFixed(1);
	document.getElementById("Round").innerHTML = round;
	} else {
		start = 0;
		document.getElementsByClassName("game-button")[0].innerHTML = "Start spel";	
		Rpauze = 1;
		Rcheck = 0;
	}

}
function inTurn(id){
	if(started()){
		for(x=0;x<=2;++x){
			for(y=0;y<=2;++y){
				if(id ==="["+x+"]["+y+"]"){
					if(rij[x][y]===3){
						rij[x][y] = player;
						++turn;
						switch(player){
							case 0:
							document.getElementById("["+x+"]["+y+"]").src="img/cross.jpg";
							break;
							case 1:
							document.getElementById("["+x+"]["+y+"]").src="img/circle.jpg";
							break;
						}
					win();
					switchTurn();
					}
				}
			}
		}
	}
}

function win(){
	for(x=0;x<3;x++){
		if((rij[x][0]==rij[x][1])&&(rij[x][0]==rij[x][2])&&(rij[x][0]!== 3)){
			start = 0;
			score = 2;
			scorePoints();
			alert("verticaal gewonnen");
		}
		if ((rij[0][x]==rij[1][x])&&(rij[0][x]==rij[2][x])&&(rij[0][x]!== 3)){
			start = 0;
			score = 2;
			scorePoints();
			alert("horizontaal gewonnen");
		}
	}
	if (rij[0][0]==rij[1][1]&&rij[0][0]==rij[2][2]&&rij[1][1]!==3){
		start = 0;
		score = 2;
		scorePoints();
		alert("schuin gewonnen");
	}
	if (rij[0][2]==rij[1][1]&&rij[1][1]==rij[2][0]&&rij[1][1]!= 3){
		start = 0;
		score = 2;
		scorePoints();
		alert("schuin gewonnen");
	}
	if(turn === 9){
		start = 0;
		if(score == 0){
			alert("Gelijk spel!");
			Xscore = Xscore +1;
			Oscore = Oscore +1;
			document.getElementById("XScore").innerHTML = Xscore;
			document.getElementById("OScore").innerHTML = Oscore;
			document.getElementsByClassName("game-button")[0].innerHTML = "Nog een keer :D";
			Rpauze = 1;
			Bpauze = 1;
			Rcheck = 0;
			Bcheck = 0;
		}
	}
	score = 0;
}
function scorePoints(){
	switch(player){
		case 0: Xscore = Xscore + score;
				document.getElementById("XScore").innerHTML = Xscore;
				break;
		case 1: Oscore = Oscore + score;
				document.getElementById("OScore").innerHTML = Oscore;
				break;
	}
	document.getElementsByClassName("game-button")[0].innerHTML = "Nog een keer :D";
		Rpauze = 1;
		Bpauze = 1;
		Rcheck = 0;
		Bcheck = 0;
}
	
function switchTurn(){
	switch(player){
		case 0: 
				player = 1;
				
				document.getElementById("PPTurn").src="img/circle.jpg";
				document.getElementById("PNTurn").innerHTML = 2;
				break;
		case 1: 
				player = 0;
				
				document.getElementById("PPTurn").src="img/cross.jpg";
				document.getElementById("PNTurn").innerHTML = 1;
				break;
	}
	BSTijd = 0;
}
