<h2 align="center">ElvSites</h2>

## Laravel Site
    > php artisan serve
- Liens :
  - Admin : http://localhost:8000/admin/site
  - User (admin) : elvire@gmail.com / 123456
  - User (user) : john@doe.fr / 123456
  - Client : http://localhost:8000/
  - Lancer l'exécutable Mailhog pour voir l'interface Mail

# Gestion de mes sites web

## Partie Administration (Back)
- Permet à l'administrateur du site de gérer l'ensemble des sites, des catégories et technologies associées à un site 
- CRUD sites, catégories, technologies
- Pagination
- Système d'authentification
- Système d'envoi d'emails (mailable/markdown)
- Gestion des images
- Redimensionnement images (Glide)

## Partie Public (Front)
- Permet à l'utilisateur de consulter les différents sites 
- Filtrer les sites en fonction de différents critères de recherche (mot clé, année, catégories)

## Base de données MySql
- elvsites
- identifiants de connexion test : john@doe.fr / 0000

## Librairies
- Glide : redimensionner images
- htmx : requêtes Ajax (suppression images)
