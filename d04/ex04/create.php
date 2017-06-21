<?php
	if ($_POST["passwd"] == "" || $_POST["login"] == "" || $_POST["submit"] != "OK")
	{
		echo "ERROR\n";
		exit;
	}
	$new_user["login"] = $_POST["login"];
	$new_user["passwd"] = hash("whirlpool", $_POST["passwd"]);
	if (!file_exists("../htdocs"))
	{
		mkdir("../htdocs");
		mkdir("../htdocs/private");
	}
	if (!file_exists("../htdocs/private"))
		mkdir("../htdocs/private");
	if (!file_exists("../htdocs/private/passwd"))
		file_put_contents("../htdocs/private/passwd", "");
	$accounts_info = unserialize(file_get_contents("../htdocs/private/passwd"));
	if ($accounts_info != "")
	{
		foreach ($accounts_info as $account)
		{
			if ($new_user["login"] === $account["login"])
			{
				echo "ERROR\n";
				exit;
			}
		}
	}
	$accounts_info[] = $new_user;
	file_put_contents("../htdocs/private/passwd", serialize($accounts_info));
	header("Location: index.html");
	echo "OK\n";
?>