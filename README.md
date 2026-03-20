# Vite & Gourmand — ECF DWWM 2026

Application web pour un traiteur bordelais.

## Stack technique
- Backend : Symfony 7 + Doctrine ORM + Twig
- BDD SQL : MariaDB 10.11
- BDD NoSQL : MongoDB 6.0
- Frontend : Twig + Bootstrap 5 + JavaScript (Fetch/AJAX)
- Environnement : Docker + Docker Compose

## Installation locale
git clone git@github.com:Dr-nor/vite-et-gourmand.git
cd vite-et-gourmand
cp .env.example .env
docker-compose up --build

## Accès
- Application : http://localhost:8080
- phpMyAdmin : http://localhost:8081

## Identifiants de test
- Admin : admin@vite-gourmand.fr / Admin1234!
- Employé : employe@vite-gourmand.fr / Employe1234!
- Utilisateur : user@vite-gourmand.fr / User1234!
