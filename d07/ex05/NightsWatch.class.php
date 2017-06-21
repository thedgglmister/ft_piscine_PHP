<?php
	class NightsWatch
	{
		public $watchmen;

		public function __construct()
		{
			$this->watchmen = array();
		}

		public function recruit($person)
		{
			$this->watchmen[] = $person;
		}

		public function	fight()
		{
			foreach($this->watchmen as $fighter)
			{
				if (method_exists($fighter, "fight"))
				$fighter->fight();
			}
		}
	}
?>
