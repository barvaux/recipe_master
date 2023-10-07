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



function francaiseAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes d'entrées
    include_once '../app/models/categoriesModel.php';

    $francaise_recipes = \App\Models\CategoriesModel\getFrancaiseRecipes($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes française";
    ob_start();
    include '../app/views/categories/francaise.php';
    $content = ob_get_clean();
}

function italienneAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $italienne_recipes = \App\Models\CategoriesModel\getItalienneRecipes($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plats Italien";
    ob_start();
    include '../app/views/categories/italienne.php';
    $content = ob_get_clean();
}

function japonaiseAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $japonaise_recipes = \App\Models\CategoriesModel\getJaponaise($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plats japonais";
    ob_start();
    include '../app/views/categories/japonaise.php';
    $content = ob_get_clean();
}

function mexicaineAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $mexicaine_recipes = \App\Models\CategoriesModel\getMexicaine($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plats mexicain";
    ob_start();
    include '../app/views/categories/mexicaine.php';
    $content = ob_get_clean();
}

function indienneAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $indienne_recipes = \App\Models\CategoriesModel\getIndienne($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plats indien";
    ob_start();
    include '../app/views/categories/indienne.php';
    $content = ob_get_clean();
}

function chinoiseAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $chinoise_recipes = \App\Models\CategoriesModel\getChinoise($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plat chinois";
    ob_start();
    include '../app/views/categories/chinoise.php';
    $content = ob_get_clean();
}

function mediterraneenneAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $mediterraneenne_recipes = \App\Models\CategoriesModel\getMediterraneenne($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plat méditerranéen";
    ob_start();
    include '../app/views/categories/mediterraneenne.php';
    $content = ob_get_clean();
}

function africaineAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $africaine_recipes = \App\Models\CategoriesModel\getAfricaine($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plats africain";
    ob_start();
    include '../app/views/categories/africaine.php';
    $content = ob_get_clean();
}

function americaineAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $americaine_recipes = \App\Models\CategoriesModel\getAmericaine($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plats americain";
    ob_start();
    include '../app/views/categories/americaine.php';
    $content = ob_get_clean();
}

function thailandaiseAction(\PDO $connexion)
{
    // Incluez le modèle et obtenez les données des recettes des plats principaux
    include_once '../app/models/categoriesModel.php';

    $thailandaise_recipes = \App\Models\CategoriesModel\getThailandaise($connexion);

    // Utilisez ces données pour afficher la page correspondante
    global $title, $content;
    $title = "Recettes des plats thailandais";
    ob_start();
    include '../app/views/categories/thailandaise.php';
    $content = ob_get_clean();
}


