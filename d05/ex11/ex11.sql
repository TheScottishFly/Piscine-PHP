SELECT UPPER(user_card.last_name) AS 'NOM', user_card.first_name, subscription.price FROM user_card INNER JOIN distrib ON user_card.id_user = distrib.id_distrib INNER JOIN subscription ON distrib.id_distrib = subscription.id_sub WHERE subscription.price > 42 ORDER BY user_card.last_name, user_card.first_name;
