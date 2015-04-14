<?php

require_once 'Vertex.class.php';

Class Vector
{
	// * ATTRIBUTES ***************** //
	private $_x = 0.;
	private $_y = 0.;
	private $_z = 0.;
	private $_w = 0.;
	static public $verbose = false;

	// * CTORS / DTORS ************** //
	public function __construct(array $kwargs)
	{
		if (array_key_exists('orig', $kwargs))
			$orig = $kwargs['orig'];
		else
			$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		if (!array_key_exists('dest', $kwargs))
			exit("Error Vector.class : missing dest.");
		$this->_x = $kwargs['dest']->getX() - $orig->getX();
		$this->_y = $kwargs['dest']->getY() - $orig->gety();
		$this->_z = $kwargs['dest']->getZ() - $orig->getz();
		if (self::$verbose)
			echo $this.' constructed'.PHP_EOL;
		return ;
	}
	public function __destruct()
	{
		if (self::$verbose)
			echo $this.' destructed'.PHP_EOL;
	}

	// * GETTERS / SETTERS ********** //
	public function getX(){ return $this->_x; }
	public function getY(){ return $this->_y; }
	public function getZ(){ return $this->_z; }
	public function getW(){ return $this->_w; }

	// * MEMBER FUNCTIONS / METHODS * //
	public function	magnitude()
	{
		return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) +
				pow($this->_z, 2)));
	}
	public function normalize()
	{
		if (($mag = $this->magnitude()) == 1)
			return clone $this;
		return (new self(array(
			'dest' => new Vertex(array('x' => $this->_x / $mag,
									   'y' => $this->_y / $mag,
									   'z' => $this->_z / $mag))
			)
		));
	}
	public function add($rhs)
	{
		return (new self(array(
			'dest' => new Vertex(array('x' => $this->_x + $rhs->getX(),
									   'y' => $this->_y + $rhs->getY(),
									   'z' => $this->_z + $rhs->getZ()))
			)
		));
	}
	public function sub($rhs)
	{
		return (new self(array(
			'dest' => new Vertex(array('x' => $this->_x - $rhs->getX(),
									   'y' => $this->_y - $rhs->getY(),
									   'z' => $this->_z - $rhs->getZ()))
			)
		));
	}
	public function opposite()
	{
		return (new self(array(
			'dest' => new Vertex(array('x' => -$this->_x,
									   'y' => -$this->_y,
									   'z' => -$this->_z))
			)
		));
	}
	public function scalarProduct($k)
	{
		return (new self(array(
			'dest' => new Vertex(array('x' => $this->_x * $k,
									   'y' => $this->_y * $k,
									   'z' => $this->_z * $k))
			)
		));
	}
	public function dotProduct($rhs)
	{
		return ($this->_x * $rhs->getX() +
				$this->_y * $rhs->getY() +
				$this->_z * $rhs->getZ());
	}
	public function crossProduct($rhs)
	{
		return (new self(array(
			'dest' => new Vertex(
				array('x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
					  'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
					  'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()))
			)
		));
	}
	public function cos($rhs)
	{
		return ($this->dotProduct($rhs) /
			($this->magnitude() * $rhs->magnitude()));
	}

	
	public function __toString()
	{
		$ret = get_called_class().'( ';
		$t = 0;
		foreach (get_object_vars($this) as $k => $v)
		{
			if ($k[0] == '_')
			{
				$key = substr($k, 1);
				if (method_exists(get_called_class(),
					($funname = 'get'.ucfirst(substr($k, 1)))))
					$val = $this->$funname();
				else
					$val = $v;
			}
			else
			{
				$val = $v;
				$key = $k;
			}
			$key .= ':';
			if (gettype($val) == "array")
				$str = str_replace(" ", "", str_replace("\n", "", var_export($val, true)));
			else if (gettype($val) == "double")
				$str = sprintf("%.2f", $val);
			else if (is_a($val, "Color") or ($val == null and $k === "_color"))
			{
				if (!self::$verbose or $val == null)
					continue ;
				$str = $val;
				$key = '';
			}
			else
				$str = var_export($val, true);
			if ($t)
				$ret .= ", ";
			else
				$t = 1;
			$ret .= $key.$str;
		}
		$ret .= ' )';
		return $ret;
	}
	
	public static function doc()
	{
		if (file_exists(get_called_class().".doc.txt"))
			return file_get_contents(get_called_class().".doc.txt");
	}
}
?>
