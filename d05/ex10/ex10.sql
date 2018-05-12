SELECT film AS 'Titre', summary AS 'Resume', prod_year FROM film INNER JOIN genre ON film.id_genre = genre.id_genre WHERE genre.nom = 'erotic' ORDER BY prod_year DESC;
