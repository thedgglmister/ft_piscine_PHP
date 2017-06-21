<?php
	function ft_is_sort($arr)
	{	
		$orig_arr = $arr;
		sort($arr);
		if ($orig_arr === $arr)
			return (true);
		else
			return (false);
	}
?>