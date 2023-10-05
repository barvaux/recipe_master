<?php
namespace App\Controllers\CategoriesController;
use App\Models\CategoriesModel;

function entreesAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes d'entrées
    include_once '../app/models/categoriesModel.php';

    $entrees_recipes = \App\Models\CategoriesModel\getEntreesRecipes($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes d'Entrées";
    ob_start();
    include '../app/views/categories/entrees.php';
    $content = ob_get_clean();
}

function platsPrincipauxAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $platsPrincipaux_recipes = \App\Models\CategoriesModel\getPlatsPrincipauxRecipes($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plats principaux";
    ob_start();
    include '../app/views/categories/platsPrincipaux.php';
    $content = ob_get_clean();
}

function dessertsAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $desserts_recipes = \App\Models\CategoriesModel\getDesserts($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des desserts";
    ob_start();
    include '../app/views/categories/desserts.php';
    $content = ob_get_clean();
}

function vegetarienAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $vegetarien_recipes = \App\Models\CategoriesModel\getVegetarien($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plats végétarien";
    ob_start();
    include '../app/views/categories/vegetarien.php';
    $content = ob_get_clean();
}

function veganAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $vegan_recipes = \App\Models\CategoriesModel\getVegan($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plats vegan";
    ob_start();
    include '../app/views/categories/vegan.php';
    $content = ob_get_clean();
}
