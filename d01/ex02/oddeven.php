#!/usr/bin/php
<?php
	while (1)
	{
		echo "Enter a number: ";
		$response = trim(fgets(STDIN));
		if(feof(STDIN))
		{
			echo "^D\n";
			exit();
		}
		if (!is_numeric($response))
			echo "'$response' is not a number\n";
		else if ($response % 2)
			echo "The number $response is odd\n";
		else
			echo "The number $response is even\n";
	}
?>