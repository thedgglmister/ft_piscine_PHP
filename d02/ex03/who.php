#!/usr/bin/php
<?php
	$handle = fopen("/var/run/utmpx", "r");
	$bin = fread($handle, 628);
	$bin = fread($handle, 628);
	while (!feof($handle))
	{
		$bin = fread($handle, 628);
		$arr = unpack("a256user/a4id/a32line/ipid/itype/I2time/a256host/a64pad", $bin);
		if ($arr["type"] == 7)
			$who[$arr["line"]] = array("user" => $arr["user"], "tty" => $arr["line"], "time" => $arr["time1"] - 25200);
	}
	ksort($who);
	unset($who[""]);
	foreach ($who as $user_data)
	{
		echo $user_data["user"]." ";
		echo $user_data["tty"]."  ";
		$month = date("M", $user_data["time"]);
		$date = date("j", $user_data["time"]);
		$time = date("H:i", $user_data["time"]);
		echo $month." ";
		if (strlen($date) < 10)
			echo " ";
		echo $date." ".$time."\n";
	}
?>
