<?php
require_once("classes/classes.php");
session_start();

	if (!file_exists("game_data"))
	{
		$_SESSION["player_n"] = 1;
		$game = new Game();
		$p1 = new Player($_POST["player_name"]);
		$ship1 = new Ship("a");
		$ship2 = new Ship("b");
		$p1->addShip($ship1);
		$p1->addShip($ship2);
		$game->addPlayer($p1);

		$handle = fopen("game_data", "w");
		flock($handle, LOCK_EX);
		fwrite($handle, serialize($game));
		flock($handle, LOCK_UN);
		fclose($handle);
		header("Location: waiting.php");
	//	$game->play();
	}
	else
	{
		$_SESSION["player_n"] = 2;
		$handle = fopen("game_data", "r+");
		flock($handle, LOCK_SH);
		$buffer = "";
		while (!feof($handle))
			$buffer .= fread($handle, 100);
		flock($handle, LOCK_UN);
		$game = unserialize($buffer);
		$p2 = new Player($_POST["player_name"]);
		$ship1 = new Ship("c");
		$ship2 = new Ship("d");
		$p2->addShip($ship1);
		$p2->addShip($ship2);
		$game->addPlayer($p2);
		flock($handle, LOCK_EX);
		fwrite($handle, serialize($game));
		flock($handle, LOCK_UN);
		fclose($handle);
		header("Location: waiting.php");
	//	$game->play();
	}
?>
