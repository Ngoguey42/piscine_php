SELECT `etage_salle` 'etage', SUM(`nbr_siege`) 'sieges'
	   FROM `SALLE`
	   GROUP BY etage
	   ORDER BY sieges DESC;
