SELECT `title` AS `Title`,
		`summary` AS `Summary`,
		`prod_year`
 	FROM db_biremong.film
	INNER JOIN db_biremong.genre
		ON db_biremong.film.id_genre = db_biremong.genre.id_genre
	WHERE (db_biremong.genre.name = "erotic")
	ORDER BY `prod_year` DESC;
