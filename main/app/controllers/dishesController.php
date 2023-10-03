<?php

namespace App\Controllers\DishesController;

use \App\Models\DishesModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/dishesModel.php';
    $dishes = DishesModel\findAll($connexion);

    global $title, $content;
    $title = "Dishes";
    ob_start();
    include '../app/views/dishes/index.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/dishesModel.php';
    $dishe = DishesModel\findOneById($connexion, $id);

    global $title, $content;
    $title = $dishe['title'];
    ob_start();
    include '../app/views/dishes/show.php';
    $content = ob_get_clean();
}

// API ACTIONS
function api_indexAction(\PDO $connexion)
{
    include_once '../app/models/dishesModel.php';
    $dishes = DishesModel\findAll($connexion);
    echo json_encode($dishes);
}
