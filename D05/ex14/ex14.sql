SELECT etage_salle AS etage, SUM(nbr_siege) AS siege FROM salle GROUP BY etage ORDER BY siege DESC;