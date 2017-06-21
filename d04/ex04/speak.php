<?php
//use fopne, fclose???
	session_start();
	if ($_SESSION["loggued_on_user"] == "")
	{
		echo "ERROR\n";
		exit;
	}
	if ($_POST["msg"] != "" && $_POST["submit"] == "OK")
	{
		if (!file_exists("../htdocs"))
		{
			mkdir("../htdocs");
			mkdir("../htdocs/private");
		}
		if (!file_exists("../htdocs/private"))
			mkdir("../htdocs/private");
		$handle = fopen("../htdocs/private/chat", "c+");
		flock($handle, LOCK_SH);
		$messages = unserialize(file_get_contents("../htdocs/private/chat"));
		flock($handle, LOCK_UN);
		if ($messages == "")
			$messages = array();
		$messages[] = array("login" => $_SESSION["loggued_on_user"], "time" => time(), "msg" => $_POST["msg"]);
		flock($handle, LOCK_EX);
		file_put_contents("../htdocs/private/chat", serialize($messages));
		flock($handle, LOCK_UN);
		fclose($handle);
	}
?>
<html><body>
	<form name="speak.php" action="speak.php" method="post">
		<input type="text" name="msg" value="" />
		<input type="submit" name="submit" value="OK"/>
	</form>
</body></html
