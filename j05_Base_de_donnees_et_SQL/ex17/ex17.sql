SELECT count(*) 'nb_abo',
	   		FLOOR(AVG(abo.`prix`)) 'moy_abo',
			MOD(SUM(abo.`duree_abo`), 42) 'ft'
	   FROM `abonnement` abo;
