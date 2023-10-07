<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case 'add':
        RecipesController\addAction($connexion); 
        break;    
    case 'delete':
        RecipesController\deleteAction($connexion, $_GET['id']);
        break;
    case 'editForm':
        RecipesController\editFormAction($connexion, $_GET['id']);
        break; 
    case 'edit':
        RecipesController\editAction($connexion, [
            'id'          => $_GET['id'],
            'name'        => $_POST['name'],
            'description' => $_POST['description'],
            'user_id'     => $_POST['user_id'],
            'type_id'     => $_POST['type_id'],
        ]);
        break;   
    case 'create':
        RecipesController\createAction($connexion, $_POST);
        break;
    default:
        RecipesController\indexAction($connexion);
        break;
endswitch;
