SELECT COUNT(db_biremong.film.title) AS `nb_short-films`
	FROM db_biremong.film
	INNER JOIN db_biremong.genre
	ON db_biremong.film.id_genre = db_biremong.genre.id_genre
	WHERE (db_biremong.genre.name = "short film")
		AND (db_biremong.film.duration <= 42);
