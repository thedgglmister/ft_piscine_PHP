#!/usr/bin/php
<?php
	if ($argc === 1)
		exit();
	$fixed = trim(preg_replace("/[ \t]+/", " ", $argv[1]));
	if ($fixed !== "")
		echo "$fixed\n";
?>