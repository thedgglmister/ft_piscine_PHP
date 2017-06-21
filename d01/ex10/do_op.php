#!/usr/bin/php
<?php
	if ($argc != 4)
	{
		echo "Incorrect Paarameters\n";
		exit();
	}
	$num1 = trim($argv[1]);
	$op = trim($argv[2]);
	$num2 = trim($argv[3]);
	if (!is_numeric($num1) || !is_numeric($num2))
	{
		echo "Incorrect Paarameters\n\n";
		exit();
	}
	if ($op == "+")
		echo ($num1 + $num2)."\n";
	else if ($op == "-")
		echo ($num1 - $num2)."\n";
	else if ($op == "*")
		echo ($num1 * $num2)."\n";
	else if ($op == "/")
		echo ($num1 / $num2)."\n";
	else if ($op == "%")
		echo ($num1 % $num2)."\n";
	else
		echo "Incorrect Paarameters\n";
?>