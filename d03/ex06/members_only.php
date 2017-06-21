<?php
	if ($_SERVER["PHP_AUTH_USER"] !== "zaz" || $_SERVER["PHP_AUTH_PW"] != "Ilovemylittleponey")
	{
		header('HTTP/1.0 401 Unauthorized');
		header('WWW-Authenticate: Basic realm="Member Area"');
    	echo "<html><body>That area is accessible for members only</body></html>\n\0\0\0\0\0";
    }
    else 
    {
    	$data = file_get_contents("../img/42.png");
    	$data = base64_encode($data);
    	echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64,";
    	echo "$data";
    	echo "'>\n</body></html>\n";
	}

?>