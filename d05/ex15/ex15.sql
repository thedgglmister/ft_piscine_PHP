SELECT REVERSE(SUBSTR(`phone_number`, 2)) AS `rebmunenohp`
FROM db_biremong.distrib
WHERE (`phone_number` REGEXP "^05");
