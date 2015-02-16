#!/usr/bin/php
<?php
$stdin = new SplFileObject("php://stdin");
while (1)
{
	echo "Entrez un nombre: ";
	$line = $stdin->current();
	if ($stdin->eof())
	{
		echo "\n";
		break ;
	}
	$line = trim($line);
	if (preg_match("/^[\+\-]?([0-9]+)$/", $line, $tab))
	{
		if ($tab[1] % 2)
			echo "Le chiffre $line est Impair\n";
		else
			echo "Le chiffre $line est Pair\n";		
	}
	else
		echo "'$line' n'est pas un chiffre\n";
	$stdin->next();
}
?>
