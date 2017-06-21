<?php
require_once("Vertex.class.php");

	class Vector 
	{
		public static $verbose = false;
		private $_x;
		private $_y;
		private $_z;
		private $_w;

		public static function doc()
		{
			$doc_str = "";
			if (file_exists(__dir__ . "/Vector.doc.txt"))
			{
				$doc_str .= "\n<- Vector ----------------------------------------------------------------------\n";
				$doc_str .= file_get_contents(__dir__ . "/Vector.doc.txt");
				$doc_str .= "---------------------------------------------------------------------- Vector ->\n";
			}
			return ($doc_str);
		}

		public function __construct(array $a)
		{
			if (func_num_args() !== 1)
				trigger_error("Vector Constructor Requires Exactly 1 Argument");
			if (!($a["dest"] instanceof Vertex))
				trigger_error("new Vector requires valid 'dest' value");

			if (!($a["orig"] instanceof Vertex))
				$orig = new Vertex(array("x" => 0, "y" => 0, "z" => 0));
			else
				$orig = $a["orig"];

			$this->_x = $a["dest"]->x - $a["orig"]->x;
			$this->_y = $a["dest"]->y - $a["orig"]->y;
			$this->_z = $a["dest"]->z - $a["orig"]->z;
			$this->_w = 0;

			if (self::$verbose)
				echo $this . " constructed\n";
		}


		public function __destruct()
		{
			if (self::$verbose)
				echo $this . " destructed\n";
		}


		public function	__get($name)
		{
			switch ($name)
			{
			case "x":
				return ($this->_x);
				break;
			case "y":
				return ($this->_y);
				break;
			case "z":
				return ($this->_z);
				break;
			case "w":
				return ($this->_w);
				break;
			default:
				return (null);
				break;
			}
		}

		public function __toString()
		{
			$str = sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
			return ($str);
		}

		public function magnitude()
		{
			$x2 = $this->_x * $this->_x;
			$y2 = $this->_y * $this->_y;
			$z2 = $this->_z * $this->_z;
			return (sqrt($x2 + $y2 + $z2));
		}

		public function normalize()
		{
			$mag = $this->magnitude();
			$a = array ("x" => $this->_x / $mag, "y" => $this->_y / $mag, "z" => $this->_z / $mag);
			$dest = new Vertex($a);
			$normed = new Vector(array("dest" => $dest));
			return ($normed);
		}

		public function add($v)
		{
			$a = array("x" => ($this->_x + $v->x), "y" => ($this->_y + $v->y), "z" => ($this->_z + $v->z));
			$dest = new Vertex($a);
			$sum = new Vector(array("dest" => $dest));
			return ($sum);
		}

		public function sub($v)
		{
			$a = array("x" => $this->_x - $v->x, "y" => $this->_y - $v->y, "z" => $this->_z - $v->z);
		   	$dest = new Vertex($a);
			$diff = new Vector(array("dest" => $dest));
			return ($diff);
		}

		public function opposite()
		{
			$a = array("x" => -$this->_x, "y" => -$this->_y, "z" => -$this->_z);
		   	$dest = new Vertex($a);
			$opp = new Vector(array("dest" => $dest));
			return ($opp);
		}

		public function scalarProduct($k)
		{
			$a = array("x" => $this->_x * $k, "y" => $this->_y * $k, "z" => $this->_z * $k);
		   	$dest = new Vertex($a);
			$scaled = new Vector(array("dest" => $dest));
			return ($scaled);
		}

		public function dotProduct($v)
		{
			return ($this->_x * $v->x +	$this->_y * $v->y +	$this->_z * $v->z); 
 		}

		public function cos($v)
		{
			$dot = $this->dotProduct($v);
			$mag1 = $this->magnitude();
			$mag2 = $v->magnitude();
			return ($dot / ($mag1 * $mag2));
		}

		public function crossProduct($v)
		{
			$a = array("x" => ($this->_y * $v->z - $this->_z * $v->y),
						"y" => ($this->_z * $v->x - $this->_x * $v->z),
						"z" => ($this->_x * $v->y - $this->_y * $v->x));
			$dest = new Vertex($a);
			$cross = new Vector(array("dest" => $dest));
			return ($cross);
		}







	}

?>
