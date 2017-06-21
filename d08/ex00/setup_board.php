<?php
session_start();
require_once("classes/classes.php");

	$game = unserialize($_SESSION["game"]);
	$all_pieces = array_merge($game->p1->pieces, $game->p2->pieces);
	echo json_encode($all_pieces);
?>
