SELECT count(*) 'films'
	FROM `historique_membre` histo
	WHERE DATE(histo.`date`) BETWEEN '1999-03-01' AND '2007-07-27'
		  OR (MONTH(histo.`date`) = 12 AND DAY(histo.`date`) = 24);
