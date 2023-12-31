<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;

include_once '../app/models/categoriesModel.php';


function indexAction(\PDO $connexion)
{
    // Je mets le findAll() dans $categories
    $categories = CategoriesModel\findAll($connexion);

    // Je charge la vue categories.index dans $content
    global $title, $content;
    $title = "Liste des catégories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}

function addAction()
{
    // Je charge la vue categories.add dans $content
    global $title, $content;
    $title = "Ajouter une catégorie";
    ob_start();
    include '../app/views/categories/add.php';
    $content = ob_get_clean();
}

function deleteAction(\PDO $connexion, int $id)
{ 
    $return = CategoriesModel\delete($connexion, $id);

    header('location: ' . ADMIN_ROOT . 'categories');
}

function editFormAction(\PDO $connexion, int $id)
{ 
    $categorie = CategoriesModel\findOneById($connexion, $id);

    // Je charge la vue editForm dans $content
    global $title, $content;
    $title = TITRE_CATEGORIES_EDITFORM;
    ob_start();
    include '../app/views/categories/editForm.php';
    $content = ob_get_clean();  
    
}

function editAction(\PDO $connexion, array $data = null)
{ 
    $return = CategoriesModel\updateOneById($connexion, $data);

    header('location: ' . ADMIN_ROOT . 'categories');
}


function createAction(\PDO $connexion, array $data)
{
    $categorie = CategoriesModel\insertOne($connexion, $data);
    header('location: ' . ADMIN_ROOT . 'categories');
}
