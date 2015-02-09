#!/usr/bin/php
<?PHP
while (1)
{
	echo "Entrez un nombre: ";
	$line = fgets(STDIN);
	if (feof(STDIN))
		exit("\n");
	if (ereg("^[[:space:]]*".
			 "([\+\-]?)([0-9]+)".
			 "\n?$", $line, $tab))
	{
		if ($tab[2] % 2)
			echo "Le chiffre $tab[1]$tab[2] est Impair\n";
		else
			echo "Le chiffre $tab[1]$tab[2] est Pair\n";		
	}
	else
	{
		$line = substr($line, 0, -1);
		echo "'$line' n'est pas un chiffre\n";
	}
}
?>
