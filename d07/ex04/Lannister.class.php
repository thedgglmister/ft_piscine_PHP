<?php
	class Lannister
	{
		public $exceptions;

		public function sleepWith($person)
		{
			$exception = false;
			foreach ($this->exceptions as $class => $response)
			{
				if (is_a($person, $class))
				{
					$exception = true;
					$res = $response;
				}
					
			}
			if ($exception)
				echo $res;
			else if (is_a($person, "Lannister"))
				echo "Not even if I'm drunk !\n";
			else
				echo "Let's do this.\n";
		}
	}
?>
