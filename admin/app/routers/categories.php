<?php

use \App\Controllers\CategoriesController;

include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'add':
        CategoriesController\addAction();
        break;
    case 'delete':
        CategoriesController\deleteAction($connexion, $_GET['id']);
        break;
    case 'editForm':
        CategoriesController\editFormAction($connexion, $_GET['id']);
        break; 
    case 'edit':
        CategoriesController\editAction($connexion, [
            'id'   => $_GET['id'],
            'name' => $_POST['name']
        ]);
        break;   
    case 'create':
        CategoriesController\createAction($connexion, $_POST);
        break;
    default:
        CategoriesController\indexAction($connexion);
        break;
endswitch;
