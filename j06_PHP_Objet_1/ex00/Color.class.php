<?php
Class Color
{
	public static $verbose = false;
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public function add(Color $var)
	{
		if ($var === null)
		{
			echo "Error addition can't be done. (Parameter missing)\n";
			return ;
		}
		return new Color(array('red' => $this->red + $var->red,
							   'green' => $this->green + $var->green,
							   'blue' => $this->blue + $var->blue));
	}
	
	public function sub(Color $var)
	{
		if ($var === null)
		{
			echo "Error substraction can't be done. (Parameter missing)\n";
			return ;
		}
		return new Color(array('red' => $this->red - $var->red,
							   'green' => $this->green - $var->green,
							   'blue' => $this->blue - $var->blue));
	}
	
	public function mult($var)
	{
		if ($var === null)
		{
			echo "Error multiplication can't be done. (Parameter missing)\n";
			return ;
		}
		return new Color(array('red' => $this->red * $var,
							   'green' => $this->green * $var,
							   'blue' => $this->blue * $var));
	}
	
	public function __construct(array $kwargs)
	{
		if (array_key_exists('red', $kwargs))
			$this->red = (int)$kwargs['red'];;
		if (array_key_exists('green', $kwargs))
			$this->green = (int)$kwargs['green'];
		if (array_key_exists('blue', $kwargs))
			$this->blue = (int)$kwargs['blue'];
		if (array_key_exists('rgb', $kwargs))
		{
			$this->blue = (int)($kwargs['rgb'] % 256);
			$this->green = (int)(($kwargs['rgb'] >> 8) % 256);
			$this->red = (int)(($kwargs['rgb'] >> 16) % 256);
		}
		if (self::$verbose)
			echo $this.' constructed.'.PHP_EOL;
		return ;
	}
	
	public function __destruct()
	{
		if (self::$verbose)
			echo $this.' destructed.'.PHP_EOL;
	}
	
	public function __toString()
	{
		$ret = static::class.'( ';
		$t = 0;
		foreach (get_object_vars($this) as $k => $v)
		{
			if ($k[0] == '_' and
					method_exists(static::class,
					($funname = 'get'.ucfirst(substr($k, 1)))))
				$str = $this->$funname();
			else
				$str = $v;
			if (gettype($str) == "array")
				$str = str_replace(" ", "", str_replace("\n", "", var_export($str, true)));
			else
				$str = var_export($str, true);
			if ($t)
				$ret .= ", ";
			else
				$t = 1;
			$ret .= $k.': '.sprintf("%3s", $str);
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
