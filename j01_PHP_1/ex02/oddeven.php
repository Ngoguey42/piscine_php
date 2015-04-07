#!/usr/bin/php
<?PHP
while (1)
{
	echo "Entrez un nombre: ";
	$line = fgets(STDIN);
	if (feof(STDIN))
		exit(PHP_EOL);
	if (preg_match("/^\s*".
		"([\+\-]?)([0-9]*)([0-9])".
		"\n?$/", $line, $tab))
	{
		if ($tab[3] % 2)
			echo "Le chiffre $tab[1]$tab[2]$tab[3] est Impair".PHP_EOL;
		else
			echo "Le chiffre $tab[1]$tab[2]$tab[3] est Pair".PHP_EOL;
	}
	else
	{
		$line = substr($line, 0, -1);
		echo "'$line' n'est pas un chiffre".PHP_EOL;
	}
}
?>
