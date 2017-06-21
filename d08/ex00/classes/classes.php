<?php

	class Game
	{
		public $p1;
		public $p2;

		public function addPlayer($player)
		{
			if (!isset($this->p1))
				$this->p1 = $player;
			else
				$this->p2 = $player;
		}

		public function play()
		{
			echo $this->p1->ships["a"];
			echo '<html>';
				echo '<head>';
					echo '<link rel="stylesheet" href="index.css" />';
					echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
					echo '<script src="index.js"></script>';
				echo '</head>';
				echo '<body>';
					echo '<table>';
					foreach($this->p1->ships as $name => $value)
						echo '<div id="' . $name . '" class="piece p1_piece"></div>';
					foreach($this->p2->ships as $name => $value)
						echo '<div id="' . $name . '" class="piece p2_piece"></div>';
					for ($i = 0; $i < 100; $i++)
					{
						echo '<tr>';
						for ($j = 0; $j < 150; $j++)
							echo '<td></td>';
						echo '</tr>';
					}
					echo '</table>';
				echo '</body>';
			echo '</html>';
		}
	}

	class Player
	{
		public $name;
		public $ship_cnt;
		public $ships;

		public function __construct($name)
		{
			$this->name = $name;
		}

		public function addShip($ship)
		{
			$this->ships[$ship->name] = $ship;
			$this->ship_cnt += 1;
		}
	}

	class Ship
	{
		public $x;
		public $y;
		public $name;

		public function __construct($name)
		{
			$this->name = $name;
		}
	}
?>
