<?php
	if ($_POST["newpw"] == "" || $_POST["submit"] != "OK")
	{
		echo "ERROR\n";
		exit;
	}
	$user["login"] = $_POST["login"];
	$user["oldpw"] = hash("whirlpool", $_POST["oldpw"]);
	$user["newpw"] = hash("whirlpool", $_POST["newpw"]);
	if (!file_exists("../htdocs/private/passwd"))
	{
		echo "ERROR\n";
		exit;
	}
	$accounts_info = unserialize(file_get_contents("../htdocs/private/passwd"));
	if ($accounts_info == "")
	{
		echo "ERROR\n";
		exit;
	}
	$count = count($accounts_info);
	$match = false;
	for ($i = 0; $i < $count; $i++)
	{
		if ($user["login"] === $accounts_info[$i]["login"] && $user["oldpw"] === $accounts_info[$i]["passwd"])
		{
			$match = true;
			$accounts_info[$i]["passwd"] = $user["newpw"];
		}
	}
	if ($match === false)
	{
		echo "ERROR\n";
		exit;
	}
	file_put_contents("../htdocs/private/passwd", serialize($accounts_info));
	header("Location: index.html");
	echo "OK\n";
?>
