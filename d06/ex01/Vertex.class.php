<?php
require_once("Color.class.php");

	class Vertex
	{
		public static $verbose = false;
		private $_x;
		private $_y;
		private	$_z;
		private $_w;
		private $_color;

		public static function doc()
		{
			$doc_str = "";
			if (file_exists(__dir__ . "/Vertex.doc.txt"))
			{
				$doc_str .= "\n<- Vertex ----------------------------------------------------------------------\n";
				$doc_str .= file_get_contents(__dir__ . "/Vertex.doc.txt");
				$doc_str .= "---------------------------------------------------------------------- Vertex ->\n";
			}
			return ($doc_str);
		}

		public function __construct(array $a)
		{
			if (func_num_args() != 1)
				trigger_error("Vertex Constructor Requires Exaclty 1 Argument");
			if (!is_numeric($a["x"]))
				trigger_error("new Vertex Requires Valid 'x' value");
			if (!is_numeric($a["y"]))
				trigger_error("new Vertex Requires Valid 'y' value");
			if (!is_numeric($a["z"]))
				trigger_error("new Vertex Requires Valid 'z' value");

			$this->_x = 0;
			$this->_y = 0;
			$this->_z = 0;
			$this->_w = 1.0;
			$this->_color = new Color(array("rgb" => 0xFFFFFF));

			if (isset($a["x"]) && is_numeric($a["x"]))
				$this->_x = $a["x"];
			if (isset($a["y"]) && is_numeric($a["y"]))
				$this->_y = $a["y"];
			if (isset($a["z"]) && is_numeric($a["z"]))
				$this->_z = $a["z"];
			if (isset($a["w"]) && is_numeric($a["w"]))
				$this->_w = $a["w"];
			if (isset($a["color"]) && $a["color"] instanceof Color)
				$this->_color = $a["color"];

			if (self::$verbose)
				echo $this . " constructed\n";
		}

	
		public function __destruct()
		{
			if (self::$verbose)
				echo $this . " destructed\n";
		}

		public function __get($name)
		{
			switch ($name)
			{
			case "x":
				return($this->_x);
				break;
			case "y":
				return($this->_y);
				break;
			case "z":
				return($this->_z);
				break;
			case "w":
				return($this->_w);
				break;
			case "color":
				return($this->_color);
				break;
			default:
				return(null);
				break;
			}
		}

		public function __set($name, $value)
		{
			switch ($name)
			{
			case "x":
				if (is_numeric($value))
					$this->_x = $value;
				break;
			case "y":
				if (is_numeric($value))
					$this->_y = $value;
				break;
			case "z":
				if (is_numeric($value))
					$this->_z = $value;
				break;
			case "w":
				if (is_numeric($value))
					$this->_w = $value;
				break;
			case "color":
				if ($value instanceof Color)
					$this->_color = $value;
				break;
			}
		}



		public function __toString()
		{	
			$str = "";
			$str .= sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f", 
							$this->_x, $this->_y, $this->_z, $this->_w);
			if (self::$verbose)
				$str .= sprintf(", Color( red: %3d, green: %3d, blue: %3d ) )", 
								$this->_color->red, $this->_color->green, $this->_color->blue);
			else
				$str .= " )";
			return ($str);
		}
 
 
	}
	
?>
