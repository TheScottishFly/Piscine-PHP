SELECT last_name, first_name, CAST(GETDATE() as birthdate) FROM user_card WHERE year(birthdate) = 1989 ORDER BY nom ASC;
