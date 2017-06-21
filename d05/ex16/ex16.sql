SELECT COUNT(*)
FROM db_biremong.member_history
WHERE (`date` BETWEEN DATE(2006-10-30) AND DATE(2007-07-27))
	OR (MONTH(`date`) = 12 AND DAY(`date`) = 24); 
