# Projet Sportyproj

Ce projet a été créé dans le cadre d'un TFE et par la demande d'autre personnes.

Sportyproj est une application visant le monde de l'athlétisme et plus précisément les club d'athlétisme composé de coach et d'affiliés.

Cette application vise principalement à :
* permettre une présentation de différentes informations à des visiteurs et utilisateurs.
* mettre à disposition un espace pour des affiliés et pour des administarteurs.

## Spécifications techniques

* PHP 5.6
  * CodeIgniter 3.1.4
  
* JavaScript
  * jQuery 2.2.4
  
* HTML 5 

* CSS 3
  * Materialize 0.98.2

* Données de compte
  * Admin
    * Email: epfc@example.io
    * password : epfc

  * Athlete
    * Email : laron0@amazon.de
    * password : athlete

  * User
    * Email : alownds12@unicef.org
    * password : user

## Mise en place
    * Vérifier dans application/config/config.php
        * $config['base_url'] = 'http://localhost/sportyproj/'
        * $config['index_page'] = '';
        * $config['sess_driver'] = 'database'; + avoir créer table ci_session
    * Vérifier dans application/config/database.php
    * Importer dump de base de données sportyproj.sql (pas sportyprojSafe.sql)
