#Symfony Rest API

Projet simple d'une Rest API avec Symfony.

**Installation des prérequis :**

- PHP / Composer / Wamp / phphmyadmin
- Postman est un plus

Utilisation de FOSRestBundle pour l'API en Rest.

**Mise en place de la base de données :**
```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --dump-sql --force
```

**Remplir la base de données :** 
```
INSERT INTO `places` (`id`, `name`, `address`) VALUES (NULL, 'Tour Eiffel', '5 Avenue Anatole France, 75007 Paris'), (NULL, 'Mont-Saint-Michel', '50170 Le Mont-Saint-Michel'), (NULL, 'Château de Versailles', 'Place d''Armes, 78000 Versailles')
INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`) VALUES (NULL, 'Ab', 'Cde', 'ab.cde@test.local'), (NULL, 'Ef', 'Ghi', 'ef.ghi@test.local');
```

**Récupérer les dépendances :**

```
php composer.phar install
```

**Utilisation de l'API :**

Ajouter des prix pour une place
![Alt text](/assets/addPrice.png?raw=true "Ajouter un prix")

Ajouter des préférences pour un utilisateur (le faire plusieurs voir avec d'autre information)
![Alt text](/assets/addPreference.png?raw=true "Ajouter une préférence")

Ajouter des thémes pour une place
![Alt text](/assets/addThemes.png?raw=true "Ajouter un théme")

Et pour finir avoir des suggestions pour un utilisateur 
![Alt text](/assets/addSuggestions.png?raw=true "Avoir des suggestions")

Si vous avez une question ou autre, n'hésitez pas.