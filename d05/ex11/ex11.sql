SELECT UPPER(db_biremong.user_card.last_name) AS NAME, db_biremong.user_card.first_name, db_biremong.subscription.price
	FROM db_biremong.member
	INNER JOIN db_biremong.user_card
		ON db_biremong.member.id_member = db_biremong.user_card.id_user
	INNER JOIN db_biremong.subscription
		ON db_biremong.member.id_sub = db_biremong.subscription.id_sub 
	WHERE db_biremong.subscription.price > 42
	ORDER BY db_biremong.user_card.last_name ASC, db_biremong.user_card.first_name ASC;
