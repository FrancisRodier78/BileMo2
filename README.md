# BileMo2

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/2fcb23d175ec4f659f4780001d6da4a0)](https://www.codacy.com/gh/FrancisRodier78/BileMo2/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=FrancisRodier78/BileMo2&amp;utm_campaign=Badge_Grade)

Création d'une API pour consulter une base de donnée regroupant des Produits et des Utilisateurs (achéteurs) lisible par des Clients (commerçants).

Environnement utilisé durant le développement Symfony 5.1.* Composer 2.0.9 PHP 7.4.9 MySQL 5.7.31 

Installation - Clonez ou téléchargez le repository GitHub dans le dossier voulu : git clone https://github.com/FrancisRodier78/BileMo2.git

- Configurez vos variables d'environnement tel que la connexion à la base de données ou votre serveur SMTP ou adresse mail dans le fichier .env.local 
qui devra être crée à la racine du projet en réalisant une copie du fichier .env.

- Téléchargez et installez les dépendances back-end du projet avec Composer :
composer install

- Créez la base de données si elle n'existe pas déjà, taper la commande ci-dessous en vous plaçant dans le répertoire du projet :
php bin/console doctrine:database:create

- Créez les différentes tables de la base de données en appliquant les migrations :
php bin/console doctrine:migrations:migrate

- Installer les fixtures pour avoir une démo de données fictives :
php bin/console doctrine:fixtures:load

- Félications le projet est installé correctement.
