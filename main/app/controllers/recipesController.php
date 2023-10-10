<?php


namespace App\Controllers\RecipesController; 
 
function indexAction(\PDO $connexion) 
{ 
    include_once '../app/models/recipesModel.php'; 
    $latestDishes = \App\Models\RecipesModel\findLatestDishes($connexion); 
 
    global $title, $content; 
    $title = "Les 9 dernières recettes"; 
    ob_start(); 
    include '../app/views/recipes/index.php'; 
    
    $content = ob_get_clean(); 
} 


function showAction(\PDO $connexion, int $id) {
    // Utilisez $id pour récupérer les détails de la recette depuis le modèle
    include_once '../app/models/recipesModel.php';
    $recipe = \App\Models\RecipesModel\findOneById($connexion, $id);
 
    GLOBAL $content, $title;
    ob_start();
    include '../app/views/recipes/show.php'; 
    
    $content = ob_get_clean();

}

function randomAction(\PDO $connexion, int $id) {
    // Utilisez $id pour récupérer les détails de la recette depuis le modèle
    include_once '../app/models/recipesModel.php';
    $recipe = \App\Models\RecipesModel\findRandomDish($connexion, $id);
 
    GLOBAL $content, $title;
    ob_start();
    include '../app/views/recipes/acceuil.php'; 
    $content = ob_get_clean();

}

function threePopularDishesAction(\PDO $connexion, int $id) {
    // Utilisez $id pour récupérer les détails de la recette depuis le modèle
    include_once '../app/models/recipesModel.php';
    $threePopularDishes = \App\Models\RecipesModel\findThreePopularDishes($connexion, $id);
 
    GLOBAL $content, $title;
    ob_start();
    include '../app/views/recipes/acceuil.php'; 
    $content = ob_get_clean();

}

function UserMostPopularRecipesAction(\PDO $connexion, int $id) {
    // Utilisez $id pour récupérer les détails de la recette depuis le modèle
    include_once '../app/models/recipesModel.php';
    $UserMostPopularRecipes = \App\Models\RecipesModel\findUserMostPopularRecipes($connexion, $id);
 
    GLOBAL $content, $title;
    ob_start();
    include '../app/views/recipes/acceuil.php'; 
    $content = ob_get_clean();

}