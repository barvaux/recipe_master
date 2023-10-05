<?php
namespace App\Controllers\IngredientsController;
use App\Models\IngredientsModel;

function pouletAction(\PDO $connexion)
{
    
    include_once '../app/models/ingredientsModel.php';

    $poulet_recipes = \App\Models\IngredientsModel\getPoulet($connexion);

    global $title, $content;
    $title = "Recettes à base de poulet";
    ob_start();
    include '../app/views/ingredients/poulet.php';
    $content = ob_get_clean();
}

function boeufAction(\PDO $connexion)
{
    
    include_once '../app/models/ingredientsModel.php';

    $boeuf_recipes = \App\Models\IngredientsModel\getBoeuf($connexion);

    global $title, $content;
    $title = "Recettes à base de boeuf";
    ob_start();
    include '../app/views/ingredients/boeuf.php';
    $content = ob_get_clean();
}

function poissonAction(\PDO $connexion)
{
    
    include_once '../app/models/ingredientsModel.php';

    $poisson_recipes = \App\Models\IngredientsModel\getPoisson($connexion);

    
    global $title, $content;
    $title = "Recettes à base de poisson";
    ob_start();
    include '../app/views/ingredients/poisson.php';
    $content = ob_get_clean();
}

function legumesAction(\PDO $connexion)
{
    
    include_once '../app/models/ingredientsModel.php';

    $legumes_recipes = \App\Models\IngredientsModel\getLegumes($connexion);

    
    global $title, $content;
    $title = "Recettes à base de légume";
    ob_start();
    include '../app/views/ingredients/legumes.php';
    $content = ob_get_clean();
}

function fromageAction(\PDO $connexion)
{
   
    include_once '../app/models/ingredientsModel.php';

    $fromage_recipes = \App\Models\IngredientsModel\getFromage($connexion);

    
    global $title, $content;
    $title = "Recettes à base de fromage";
    ob_start();
    include '../app/views/ingredients/fromage.php';
    $content = ob_get_clean();
}
