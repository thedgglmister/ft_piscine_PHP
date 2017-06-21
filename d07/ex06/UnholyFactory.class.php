<?php
	class UnholyFactory
	{
		public $unholy_fighters;

		public function __construct()
		{
			$unholy_fighters = array();
		}

		public function absorb($person)
		{
			if (is_a($person, "Fighter"))
			{
				foreach(
				echo "(Factory absored a fighter of type " . get_class($person) . ")\n";





			else
				echo "(Factory can't absorb this, it's not a fighter)\n";



	}
?>
