<?php

namespace App\Controllers\ChefsController;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/usersModel.php'; 
    $latestUsers = \App\Models\UsersModel\findLatestUsers($connexion); 
    
    global $title, $content;
    $title = "Les 9 dernier utilisateur";
    ob_start();
    include '../app/views/chefs/index.php'; 
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $id) {
    // Utilisez $id pour récupérer les détails de l'utilisateur depuis le modèle
    include_once '../app/models/usersModel.php';
    $user = \App\Models\UsersModel\findOneById($connexion, $id);

    // Récupérez toutes les recettes de l'utilisateur
    include_once '../app/models/recipesModel.php';
    $userRecipes = \App\Models\RecipesModel\findAllByUsersId($connexion, $id);

    GLOBAL $content, $title;
    ob_start();
    include '../app/views/chefs/show.php';
    $content = ob_get_clean();
}

