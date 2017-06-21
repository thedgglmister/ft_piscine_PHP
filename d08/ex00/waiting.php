<?php
	echo "Waiting for other player";
	flush();
	$ready = false;
	while (!$ready) 
	{
		$handle = fopen("game_data", "r");
		flock($handle, LOCK_SH);
		$buffer = "";
		while (!feof($handle))
			$buffer .= fread($handle, 100);
		flock($handle, LOCK_UN);
		$game = unserialize($buffer);
		if (isset($game->p2))
			$ready = true;
	}
	$url = "begin.php";
	echo "<script type='text/javascript'>document.location.href='" . $url . "'</script>";
?>
