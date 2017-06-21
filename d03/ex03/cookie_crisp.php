<?php
	if ($_GET["action"] == "set" && $_GET["name"] != "")
		setcookie($_GET["name"], $_GET["value"], time() + 84600);
	else if ($_GET["action"] === "get" && $_COOKIE[$_GET["name"]] != "")
		echo $_COOKIE[$_GET["name"]]."\n";
	else if ($_GET["action"] == "del" && $_GET["name"] != "")
		setcookie($_GET["name"], $_GET["value"], time() - 100);
?>