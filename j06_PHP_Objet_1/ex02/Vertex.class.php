<?php

require_once 'Color.class.php';

Class Vertex
{
	private $_x = 0.;
	private $_y = 0.;
	private $_z = 0.;
	private $_w = 1.;
	private $_color = NULL;
	static public $verbose = false;
	
	public function __construct(array $kwargs)
	{
		if (array_key_exists('x', $kwargs))
			$this->setX((double)$kwargs['x']);
		if (array_key_exists('y', $kwargs))
			$this->setY((double)$kwargs['y']);
		if (array_key_exists('z', $kwargs))
			$this->setZ((double)$kwargs['z']);
		if (array_key_exists('w', $kwargs))
			$this->setW((double)$kwargs['w']);
		if (array_key_exists('color', $kwargs))
			$this->setColor(clone $kwargs['color']);
		else
			$this->setColor(new Color(array('rgb' => 0xffffff)));
		if (self::$verbose)
			echo $this.' constructed'.PHP_EOL;
		return ;
	}
	
	public function __destruct()
	{
		if (self::$verbose)
			echo $this.' destructed'.PHP_EOL;
	}
	
	public function setX($v){ $this->_x = $v; }
	public function setY($v){ $this->_y = $v; }
	public function setZ($v){ $this->_z = $v; }
	public function setW($v){ $this->_w = $v; }
	public function setColor(Color $v){ $this->_color = $v; }
	
	public function getX(){ return $this->_x; }
	public function getY(){ return $this->_y; }
	public function getZ(){ return $this->_z; }
	public function getW(){ return $this->_w; }
	public function getColor(){ return $this->_color; }
	
	public function __toString()
	{
		$ret = static::class.'( ';
		$t = 0;
		foreach (get_object_vars($this) as $k => $v)
		{
			if ($k[0] == '_')
			{
				$key = substr($k, 1);
				if (method_exists(static::class,
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
		if (file_exists(static::class.".doc.txt"))
			return file_get_contents(static::class.".doc.txt");
	}
}
?>