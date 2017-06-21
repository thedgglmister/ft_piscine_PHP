#!/usr/bin/php
<?php
	function weird_cmp($str1, $str2)
	{
		$str1 = strtolower($str1);
		$str2 = strtolower($str2);
		$i = 0;
		while ($str1[$i] === $str2[$i] && $str1[$i] !== '\0')
			$i++;
		if ($str1[$i] === '\0')
			return (-1);
		else if ($str2[$i] === '\0')
			return (1);
		else
		{
			if (ctype_alpha($str1[$i]))
			{
				if (ctype_alpha($str2[$i]))
					return (strcmp($str1, $str2));
				else
					return (-1);
			}
			else if (ctype_digit($str1[$i]))
			{
				if (ctype_alpha($str2[$i]))
					return (1);
				else if (ctype_digit(($str2[$i])))
					return strcmp($str1, $str2);
				else
					return (-1);
			}
			else
			{
				if (ctype_alnum($str2[$i]))
					return (1);
				else 
					return (strcmp($str1, $str2));
			}
		}
	}

	if ($argc === 1)
		exit();
	for ($i = 1; $i < $argc; $i++)
	{	
		$arg_arr = preg_split("([\s]+)", trim($argv[$i]));
		$count = count($arg_arr);
		for ($j = 0; $j < $count; $j++)
			$arr[] = $arg_arr[$j];
	}
	usort($arr, weird_cmp);
	$count = count($arr);
	for ($i = 0; $i < $count; $i++)
		if ($arr[$i] != "")
			echo "$arr[$i]\n";
?>