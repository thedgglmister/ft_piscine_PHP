<?php







/*
require_once("classes/classes.php");

session_start();

	$game = new Game();

	$p1 = new Player("ben");		
	$p1->addPiece("a", 1, 1);

	$p2 = new Player("maya");
	$p2->addPiece("b", 150, 100);

	$game->addBoard(150, 100);
	$game->addPlayer1($p1);
	$game->addPlayer2($p2);
	$game->play();
 */
?>

<html>
<body>
	<form name="play.php" action="play.php" method="post">
		<input type="text" name="player_name" placeholder="Enter Player Name" value="" />
		<input type="submit" name="submit" value="PLAY" />
	</form>
</body>
</html>
