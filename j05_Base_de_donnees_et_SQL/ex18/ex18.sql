SELECT d.`nom`
	   FROM `distrib` d
	   WHERE id_distrib IN (42, 62, 63, 64, 65, 66, 67, 68, 69, 71, 88, 89, 90) OR
	   		 LENGTH(d.`nom`) - LENGTH(REPLACE(LOWER(d.`nom`), 'y', '')) = 2
	   LIMIT 2, 5;
