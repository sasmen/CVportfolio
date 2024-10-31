# CVportfolio Project Structure

```
CVportfolio/
├── app/
│   └── uploads/
│       └── .keep
├── views/
│   ├── 404.php
│   ├── contact.php
│   ├── cv.php
│   ├── CVSamson.jpg
│   ├── CVSamson.pdf
│   ├── home.php
│   ├── login.php
│   ├── profile.php
│   ├── projects.php
│   ├── db.php
│   ├── footer.php
│   ├── functions.php
│   ├── header.php
│   ├── index_old.php
│   ├── index.php
│   └── logout.php
├── projects.json
├── README.md
├── setup.sql
└── styles.css
```

## Aperçu du Projet

Il s'agit d'un site portfolio basé sur PHP incluant :

Un système d'authentification utilisateur (connexion/déconnexion)
La gestion du profil
Une vitrine de projets
L'affichage du CV
Un formulaire de contact
Un design responsive

## Explication de la Structure du Répertoire

### `/app`

uploads/ : Répertoire pour les fichiers téléchargés par les utilisateurs
.keep : Fichier pour Git afin de maintenir la structure du répertoire

### `/views`

Contient tous les fichiers de vue PHP pour l'application :

404.php : Page d'erreur
contact.php : Formulaire de contact
cv.php : Page CV
home.php : Page d'accueil
login.php : Authentification utilisateur
profile.php : Gestion du profil utilisateur
projects.php : Vitrine de projets
db.php : Configuration de la base de données
functions.php : Fonctions utilitaires
header.php & footer.php : Modèles de page
index.php : Point d'entrée principal
logout.php : Fin de session

### Root Directory

projects.json : Stockage des données de projets
setup.sql : Initialisation de la base de données
styles.css : Styles globaux

## Assets

CVSamson.jpg : Image du CV
CVSamson.pdf : CV téléchargeable
CVportfolio
CV portfolio

## Vues

Les vues sont les pages principales qui seront affichées sur le site et accessibles aux utilisateurs.

## Modèle

Les fonctions sont déclarées dans le fichier functions.php et sont utilisées dans les vues et autres fichiers.

## Objectif

Création d'une plateforme de gestion des projets et des CV par utilisateur pour un accès rapide aux informations professionnelles.

## Fonctionnement

La page d'accueil inclut un exemple d'informations modifiables. Pour ce faire, vous devrez vous enregistrer, puis créer un compte/profil où toutes les données que vous entrez pourront être modifiées ultérieurement. En plus des informations, vous pourrez ajouter ou supprimer vos CV et projets pour présenter vos réalisations.

## Docker

Docker est utilisé avec une configuration Nginx en tant que serveur de test.

## Note supplémentaires

!! Problèmes quant à la finalisation du login et du logout ainsi que la modification de la barre de navigation quand un untilisateur est détecté. !!
deux versions du login que je n'ai pas réussi à faire fonctionner existe une dans login.php l'autre dans index_old.php
