SELECT `title`, `summary` FROM db_biremong.film WHERE (title REGEXP "42") OR (summary REGEXP "42") ORDER BY duration ASC;
