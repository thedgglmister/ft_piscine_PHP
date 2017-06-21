#!/usr/bin/php
<?php
	
	function wrong_format()
	{
		echo "Wrong Format\n";
		exit;
	}

	if ($argc === 1)
		exit;

	$day_find = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
	$day_replace = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	$month_find = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
	$month_replace = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

	$arr = explode(" ", $argv[1]);
	if (count($arr) != 5)
		wrong_format();

	if (($i = array_search(lcfirst($arr[0]), $day_find)) !== false)
		$arr[0] = $day_replace[$i];
	else
		wrong_format();

	if (!is_numeric($arr[1]) || $arr[1] < 0 || $arr[1] > 31)
		wrong_format();

	if (($i = array_search(lcfirst($arr[2]), $month_find)) !== false)
		$arr[2] = $month_replace[$i];
	else
		wrong_format();

	if (!is_numeric($arr[3]) || $arr[1] < 0 || $arr[1] > 9999)
		wrong_format();

	$time_arr = explode(":", $arr[4]);
	if (count($time_arr) != 3)
		wrong_format();
	foreach ($time_arr as $piece)
		if (strlen($piece) != 2)
			wrong_format();
	if (!is_numeric($time_arr[0]) || $time_arr[0] < 0 || $time_arr[0] > 23)
		wrong_format();
	if (!is_numeric($time_arr[1]) || $time_arr[1] < 0 || $time_arr[1] > 59)
		wrong_format();
	if (!is_numeric($time_arr[2]) || $time_arr[2] < 0 || $time_arr[2] > 59)
		wrong_format();

	date_default_timezone_set("Europe/Paris");

	$date = implode(" ", $arr);

	$secs = strtotime($date);
	if ($secs != "")
		echo "$secs\n";
?>