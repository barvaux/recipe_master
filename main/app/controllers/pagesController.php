<?php

namespace App\Controllers\PagesController;

function homeAction(\PDO $connexion)
{
    include_once '../app/models/dishesModel.php';
    // $mostPopularDish = \App\Models\dishesModel\findMostPopularDish($connexion);
    // $creatorOfMostPopularDish = \App\Models\dishesModel\findCreatorOfMostPopularDish($connexion);
    // $descriptionOfMostPopularDish = \App\Models\dishesModel\findDescriptionOfMostPopularDish($connexion);
    // $ratingOfMostPopularDish = \App\Models\dishesModel\findRatingOfMostPopularDish($connexion);
    // $commentCountOfMostPopularDish = \App\Models\dishesModel\findCommentCountOfMostPopularDish($connexion);
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
