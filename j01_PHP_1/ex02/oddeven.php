#!/usr/bin/php
<?PHP
	while (1)
	{
		echo "Entrez un nombre: ";
		$line = fscanf(STDIN, "%s\n");
		if (feof(STDIN))
			break ;
		if (!is_numeric($line[0]))
			echo "'$line[0]' n'est pas un chiffre\n";
		else if ($line[0] % 2)
			echo "Le chiffre $line[0] est Impair\n";
		else
			echo "Le chiffre $line[0] est Pair\n";
	}
?>
