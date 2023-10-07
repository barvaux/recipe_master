<?php

namespace App\Controllers\PagesController;

function homeAction(\PDO $connexion)
{

    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAllCategories($connexion);


    include_once '../app/models/dishesModel.php';
  
    $randomDish = \App\Models\dishesModel\findRandomDish($connexion);
    $threePopularDishes = \App\Models\dishesModel\findThreePopularDishes($connexion);
    $userMostPopularRecipesRatings = \App\Models\dishesModel\findRatingsOfUserMostPopularRecipes($connexion);
    

    include_once '../app/models/usersModel.php';
    $userMostPopular = \App\Models\usersModel\findMostPopularUser($connexion);
    $userMostPopularRecipes = \App\Models\dishesModel\findUserMostPopularRecipes($connexion);
    $mostPopularUserPicture = \App\Models\usersModel\findMostPopularUserPicture($connexion);
    


    global $title, $content;
    $title = "Popular Dishes";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
