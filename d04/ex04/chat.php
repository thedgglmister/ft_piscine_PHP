<?php
	session_start();
	if ($_SESSION["loggued_on_user"] == "")
	{
		echo "ERROR\n";
		exit;
	}
	if (!file_exists("../htdocs/private/chat"))
		exit;
	$handle = fopen("../htdocs/private/chat", "r");
	flock($handle, LOCK_SH);
	$messages = unserialize(file_get_contents("../htdocs/private/chat"));
	flock($handle, LOCK_UN);
	fclose($handle);
	if ($messages == "")
		exit;
	date_default_timezone_set("America/Los_Angeles");
	foreach ($messages as $message)
	{
		$time = date("H:i", $message["time"]);
		$user = $message["login"];
		$msg = $message["msg"];
		echo "[$time] <b>$user</b>: $msg<br />\n";
	}
?>