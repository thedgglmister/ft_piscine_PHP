<?php
	function auth($login, $passwd)
	{
		if (!file_exists("../htdocs/private/passwd"))
			return (false);

		$hashed_pw = hash("whirlpool", $passwd);

		$accounts_info = unserialize(file_get_contents("../htdocs/private/passwd"));
		if ($accounts_info == "")
			return (false);
		
		foreach ($accounts_info as $account)
		{
			if ($login === $account["login"] && $hashed_pw === $account["passwd"])
				return (true);
		}
		return (false);
	}
?>