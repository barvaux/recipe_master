<?php

namespace App\Controllers\RecipesController;

function latestRecipesAction(\PDO $connexion)
{
    include_once '../app/models/recipesModel.php';
    $latestDishes = \App\Models\RecipesModel\findLatestDishes($connexion);

    global $title, $content;
    $title = "Les 9 dernières recettes";
    ob_start();
    include '../app/views/recipes/index.php'; // Créez une vue appropriée pour afficher les 9 dernières recettes
    $content = ob_get_clean();
}

