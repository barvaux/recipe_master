<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;
use \App\Models\UsersModel;
use \App\Models\CategoriesModel;

include_once '../app/models/recipesModel.php';


function indexAction(\PDO $connexion)
{
    // Je mets le findAll() dans $recipes
    $recipes = RecipesModel\findAll($connexion);

    // Je charge la vue recipes.index dans $content
    global $title, $content;
    $title = "Liste des recettes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function addAction(\PDO $connexion)
{
    // Récupérez la liste des utilisateurs
    include_once '../app/models/usersModel.php';
    include_once '../app/models/categoriesModel.php'; 
    include_once '../app/models/ingredientsModel.php'; 

    $users = UsersModel\findAll($connexion);
    $categories = CategoriesModel\findAll($connexion);
    $ingredients = findAllIngredients($connexion);


    // Passer les données des utilisateurs à la vue
    global $title, $content;
    $title = "Ajouter une recette";
    ob_start();
    include '../app/views/recipes/add.php';
    $content = ob_get_clean();
}



function deleteAction(\PDO $connexion, int $id)
{ 
    $return = RecipesModel\delete($connexion, $id);

    header('location: ' . ADMIN_ROOT . 'recipes');
}

function editFormAction(\PDO $connexion, int $id)
{ 
    $recipe = RecipesModel\findOneById($connexion, $id);
    // Récupérez la liste des utilisateurs
    include_once '../app/models/usersModel.php';
    include_once '../app/models/categoriesModel.php'; 
    include_once '../app/models/ingredientsModel.php'; 

    $users = UsersModel\findAll($connexion);
    $categories = CategoriesModel\findAll($connexion);
    $ingredients = findAllIngredients($connexion);


    // Je charge la vue editForm dans $content
    global $title, $content;
    $title = "MODIFICATION D'UNE RECETTE";
    ob_start();
    include '../app/views/recipes/editForm.php';
    $content = ob_get_clean();  
}


function editAction(\PDO $connexion, array $data = null)
{ 
    $return = RecipesModel\updateOneById($connexion, $data);

    header('location: ' . ADMIN_ROOT . 'recipes');
}



function createAction(\PDO $connexion, array $data)
{
    $recipe = RecipesModel\insertOne($connexion, $data);
    header('location: ' . ADMIN_ROOT . 'recipes');
}
