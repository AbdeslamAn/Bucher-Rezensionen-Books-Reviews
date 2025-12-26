# 📚 Buch Bewertung – Laravel Project

A web application built with **Laravel** that allows users to view books and add reviews (Rezensionen) with a star rating ⭐.  
This project was created for learning purposes and focuses on core Laravel concepts.

---

## ✨ Features

- Display a list of books
- View single book details
- Add reviews (Rezensionen) for books
- Star rating display using a reusable Blade component
- Form validation
- Rate limiting for review submissions
- Blade + Tailwind CSS user interface

---

## 🧩 Technologies Used

- **Laravel 12**
- PHP 8+
- Blade Templates
- Eloquent ORM
- Tailwind CSS
- Rate Limiting
- MySQL

---

## ⭐ Star Rating Component

A custom Blade component is used to display ratings visually with stars instead of numbers.

- Component name: `StarRating`
- Used in:
  - Book detail page
  - Reviews section

---

## 🚦 Rate Limiting

To prevent abuse (e.g. submitting too many reviews):

- Maximum **3 reviews per hour**
- Limiting is based on:
  - Authenticated user (if available)
  - Or IP address

---

## 🛠️ Installation

```bash
git clone <repository-url>
cd buch-bewertung
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

---



# 📚 Buch Bewertung – Laravel Projekt

Eine mit **Laravel** entwickelte Webanwendung, mit der Benutzer Bücher anzeigen und Rezensionen mit einer Sternebewertung ⭐ hinzufügen können.  
Dieses Projekt wurde zu Lernzwecken erstellt und konzentriert sich auf grundlegende Laravel-Konzepte.

---

## ✨ Funktionen

- Anzeige einer Bücherliste
- Anzeige der Details eines einzelnen Buches
- Hinzufügen von Rezensionen zu Büchern
- Sternebewertung über eine wiederverwendbare Blade-Komponente
- Formularvalidierung
- Rate Limiting zur Begrenzung der Rezensionen
- Benutzeroberfläche mit Blade und Tailwind CSS

---

## 🧩 Verwendete Technologien

- Laravel
- Blade Templates
- Eloquent ORM
- Tailwind CSS
- Rate Limiting
- Blade Components

---

## ⭐ Star-Rating-Komponente

Eine eigene Blade-Komponente zur visuellen Darstellung von Bewertungen mit Sternen anstelle von Zahlen.

- Komponentenname: `StarRating`
- Verwendung:
  - Auf der Buchdetailseite
  - Im Bereich der Rezensionen

---

## 🚦 Rate Limiting

Zur Vermeidung von Missbrauch (z. B. zu viele Rezensionen in kurzer Zeit):

- Maximal **3 Rezensionen pro Stunde**
- Begrenzung erfolgt anhand von:
  - dem eingeloggten Benutzer (falls vorhanden)
  - oder der IP-Adresse

---

## 🛠️ Installation

```bash
git clone <repository-url>
cd buch-bewertung
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

---


# 📚 Buch Bewertung – Projet Laravel

Une application web développée avec **Laravel** permettant aux utilisateurs de consulter des livres et d’ajouter des **avis (recensions)** avec une **évaluation par étoiles ⭐**.  
Ce projet a été réalisé à des fins pédagogiques, en mettant l’accent sur les concepts fondamentaux de Laravel.

---

## ✨ Fonctionnalités

- Affichage de la liste des livres
- Affichage des détails d’un livre
- Ajout de recensions pour chaque livre
- Système de notation par étoiles via un composant Blade réutilisable
- Validation des formulaires
- Limitation du nombre de recensions (Rate Limiting)
- Interface utilisateur avec Blade et Tailwind CSS

---

## 🧩 Technologies utilisées

- Laravel
- Blade Templates
- Eloquent ORM
- Tailwind CSS
- Rate Limiting
- Blade Components

---

## ⭐ Composant Star Rating

Un composant Blade personnalisé permettant d’afficher visuellement les notes sous forme d’étoiles au lieu de valeurs numériques.

- Nom du composant : `StarRating`
- Utilisé dans :
  - La page de détails d’un livre
  - La section des recensions

---

## 🚦 Limitation du taux (Rate Limiting)

Afin d’éviter les abus (par exemple l’ajout massif de recensions) :

- Maximum **3 recensions par heure**
- La limitation est basée sur :
  - l’utilisateur authentifié (s’il existe)
  - ou l’adresse IP

---

## 🛠️ Installation et lancement

```bash
git clone <repository-url>
cd buch-bewertung
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

