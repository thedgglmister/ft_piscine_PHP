<?php

	Class Color
	{	
		public static $verbose = false;
		public $red;
		public $green;
		public $blue;

		public static function doc()
		{
			$doc_str = "";
			if (file_exists(__dir__ . "/Color.doc.txt"))
			{
				$doc_str .= "\n<- Color ----------------------------------------------------------------------\n";
				$doc_str .= file_get_contents(__dir__ . "/Color.doc.txt");
				$doc_str .= "---------------------------------------------------------------------- Color ->\n";
			}
			return ($doc_str);
		}

		public function __construct(array $rgb)
		{
			if (func_num_args() !== 1)
				trigger_error("Color Constructor Requires Exactly 1 Argument");
			$this->red = 0;
			$this->green = 0;
			$this->blue = 0;

			if (isset($rgb["rgb"]))
			{
				$this->red = ($rgb["rgb"] >> 16) & 0xFF;
				$this->green = ($rgb["rgb"] >> 8) & 0xFF;
				$this->blue = $rgb["rgb"] & 0xFF;
			}
			if (isset($rgb["red"]))
				$this->red = round($rgb["red"]);
			if (isset($rgb["green"]))
				$this->green = round($rgb["green"]);
			if (isset($rgb["blue"]))
				$this->blue = round($rgb["blue"]);

			if (self::$verbose)
				echo $this . " constructed.\n";
		}

		public function __destruct()
		{
			if (self::$verbose)
				echo $this . " destructed.\n";
		}

		public function __toString()
		{
			return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
		}

		public function add($addend)
		{
			if (func_num_args() !== 1 || !($addend instanceof Color))
				trigger_error(".add() Requires Exactly 1 Color Argument");
			$result_rgb = array("red" => $this->red + $addend->red, 
				"green" => $this->green + $addend->green,
				"blue" => $this->blue + $addend->blue); 
			return (new Color($result_rgb));
		}

		public function sub($subtractend)
		{
			if (func_num_args() !== 1 || !($subtractend instanceof Color))
				trigger_error(".sub() Requires Exactly 1 Color Argument");
			$result_rgb = array("red" => $this->red - $subtractend->red, 
				"green" => $this->green - $subtractend->green,
				"blue" => $this->blue - $subtractend->blue); 
			return (new Color($result_rgb));
		}
	
		public function mult($scalar)
		{
			if (func_num_args() !== 1 || !is_numeric($scalar))
				trigger_error(".mult() Requires Exactly 1 Numeric Argument");
			$result_rgb = array("red" => $this->red * $scalar, 
				"green" => $this->green * $scalar,
				"blue" => $this->blue * $scalar); 
			return (new Color($result_rgb));
		}
	}
?>
