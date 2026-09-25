# Community Library 📚

Une application web de gestion de bibliothèque communautaire développée avec Symfony. Ce projet permet de consulter un catalogue de livres, d'auteurs et de genres, avec une interface d'administration dédiée.

## 🛠️ Stack Technique

* **Backend** : PHP 8, Symfony
* **Base de données** : Doctrine ORM (SQLite configuré par défaut en développement)
* **Frontend** : Twig, AssetMapper, Symfony UX (Stimulus & Turbo)
* **Qualité & Tests** : PHPUnit, Zenstruck Foundry (Fixtures)
* **Déploiement** : Docker (via `compose.yaml`)

## ⚙️ Prérequis

* PHP 8.2+
* Composer
* [Symfony CLI](https://symfony.com/download) (recommandé) ou Docker

## 🚀 Installation locale

1. **Cloner le dépôt :**
   ```bash
   git clone https://github.com/samanheeralall/sf8pack.14.09.2026.git
   cd community-library
   ```

2. **Installer les dépendances PHP :**
   ```bash
   composer install
   ```

3. **Préparer la base de données :**
   Le projet utilise des migrations Doctrine pour structurer la base. Exécutez les commandes suivantes :
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

4. **Charger le catalogue de base (Fixtures) :**
   Pour générer des fausses données (livres, auteurs, genres) afin de tester l'application :
   ```bash
   php bin/console doctrine:fixtures:load
   ```

5. **Lancer le serveur de développement :**
   ```bash
   symfony server:start
   ```
   L'application sera accessible sur `http://localhost:8000`.
