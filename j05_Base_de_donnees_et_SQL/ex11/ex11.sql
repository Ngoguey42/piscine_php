SELECT UPPER(fiche.`nom`) AS 'NOM', fiche.`prenom`, abo.`prix`
	   FROM `fiche_personne` fiche
	   INNER JOIN `membre` memb ON fiche.`id_perso` = memb.`id_fiche_perso`
	   INNER JOIN `abonnement` abo ON memb.`id_abo` = abo.`id_abo`
	   WHERE abo.`prix` > 42
	   ORDER BY fiche.`nom` ASC, fiche.`prenom` ASC;
