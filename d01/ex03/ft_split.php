<?php
	function ft_split($str)
	{
		$str = trim($str);
		$str = preg_replace("([\s]+)", " ", $str);
		$arr = explode(" ", $str);
		return ($arr);
	}
?>
