SELECT `title`, `summary` FROM db_biremong.film WHERE (LOWER(`summary`) REGEXP "vincent") ORDER BY id_film ASC;
