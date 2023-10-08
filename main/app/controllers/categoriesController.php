<?php
namespace App\Controllers\CategoriesController;
use App\Models\CategoriesModel;

function indexAction(\PDO $connexion) {
    // Incluez le modèle et obtenez la liste de toutes les catégories
    include_once '../app/models/categoriesModel.php';
    $categories = CategoriesModel\findAllCategories($connexion);


    // Utilisez ces données pour afficher la page correspondante
    
    $title = "Liste des catégories";
    include '../app/views/categories/index.php'; // Créez une vue qui affiche la liste des catégories
    
}

function showAction(\PDO $connexion, int $id) {
    // Utilisez $id pour récupérer la catégorie correspondante depuis le modèle
    include_once '../app/models/categoriesModel.php';
    $categorie = \App\Models\CategoriesModel\findOneById($connexion, $id);

    if (!$categorie) {
        // Gérez le cas où la catégorie n'a pas été trouvée
        // Vous pouvez rediriger l'utilisateur vers une page d'erreur ou effectuer une autre action appropriée.
    } else {
        // Définissez la variable $categoryId pour l'utiliser plus tard
        $categoryId = $categorie['id'];

        // Utilisez $categoryId pour récupérer les plats de la catégorie depuis le modèle des plats (recipesModel.php)
        include_once '../app/models/recipesModel.php';
        $recipes = \App\Models\RecipesModel\findAll($connexion, [$categoryId]); // Passer l'identifiant de la catégorie sous forme de tableau

        // Reste du code pour afficher les plats de la catégorie
        GLOBAL $content, $title;
        ob_start();
        include '../app/views/categories/show.php';
        $content = ob_get_clean();
    }
}





