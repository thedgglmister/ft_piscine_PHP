#!/usr/bin/php
<?php
	if ($argc != 2)
	{
		echo "Incorrect Parameters\n";
		exit();
	}
	$argv[1] = trim($argv[1]);

	$success = preg_match("#^-?[0-9]\d*(\.\d+)?#", $argv[1], $matches);
	if ($success === 0)
	{
		echo "Syntax Error\n";
		exit();
	}
	else
		$num1 = $matches[0];

	$success = preg_match("#-?[0-9]\d*(\.\d+)?$#", $argv[1], $matches);
	if ($success === 0)
	{
		echo "Syntax Error\n";
		exit();
	}
	else
		$num2 = $matches[0];

	$argv[1] = preg_replace("#^-?[0-9]\d*(\.\d+)?#", "", $argv[1]);
	$argv[1] = preg_replace("#-?[0-9]\d*(\.\d+)?$#", "", $argv[1]);
	$op = $argv[1];

	$op = trim(preg_replace("([0-9]+)", "", $argv[1]));
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
		echo "Syntax Error\n"
?>