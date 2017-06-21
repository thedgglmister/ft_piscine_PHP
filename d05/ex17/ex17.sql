SELECT COUNT(`name`) AS `nb_susc`, FLOOR(AVG(`price`)) AS `av_susc`, MOD(SUM(`duration_sub`), 42) AS `ft`
FROM db_biremong.subscription;

