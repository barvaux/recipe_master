<?php
namespace App\Controllers\IngredientsController;
use App\Models\IngredientsModel;

function indexAction(\PDO $connexion) {
    // Incluez le modèle et obtenez la liste de toutes les catégories
    include_once '../app/models/ingredientsModel.php';
    $ingredients = IngredientsModel\findAllIngredients($connexion);


    // Utilisez ces données pour afficher la page correspondante
    
    $title = "Liste des ingrédients";
    include '../app/views/ingredients/index.php'; // Créez une vue qui affiche la liste des catégories
    
}

function showAction(\PDO $connexion, int $id) {
    // Utilisez $id pour récupérer l'ingrédient correspondant depuis le modèle
    include_once '../app/models/ingredientsModel.php';
    $ingredient = \App\Models\IngredientsModel\findOneById($connexion, $id);

    if (!$ingredient) {
        // Gérez le cas où l'ingrédient n'a pas été trouvé
        // Vous pouvez rediriger l'utilisateur vers une page d'erreur ou effectuer une autre action appropriée.
    } else {
        // Définissez la variable $ingredientId pour l'utiliser plus tard
        $ingredientId = $ingredient['id'];

        // Utilisez $ingredientId pour récupérer les plats associés à l'ingrédient depuis le modèle des plats (recipesModel.php)
        include_once '../app/models/recipesModel.php';
        $recipes = \App\Models\RecipesModel\findAllByIngredients($connexion, [$ingredientId]); // Passer l'identifiant de l'ingrédient sous forme de tableau

        // Reste du code pour afficher les plats associés à l'ingrédient
        GLOBAL $content, $title;
        ob_start();
        include '../app/views/ingredients/show.php';
        $content = ob_get_clean();
    }
}
