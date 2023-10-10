<?php

namespace App\Controllers\PagesController;

function homeAction(\PDO $connexion)
{

    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAllCategories($connexion);


    include_once '../app/models/recipesModel.php';
  
    $random = \App\Models\recipesModel\findRandomDish($connexion);
    $threePopularDishes = \App\Models\recipesModel\findThreePopularDishes($connexion);
    $UserMostPopularRecipes = \App\Models\recipesModel\findUserMostPopularRecipes($connexion);
    

    include_once '../app/models/usersModel.php';
    $userMostPopular = \App\Models\usersModel\findMostPopularUser($connexion);
    
   
    global $title, $content;
    $title = "Popular Dishes";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
