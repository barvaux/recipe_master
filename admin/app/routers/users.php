<?php

use \App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

switch ($_GET['users']):
    case 'logout':
        UsersController\logoutAction($connexion);
        break;
    default:
        UsersController\dashboardAction($connexion);
        break;
endswitch;



switch ($_GET['users']):
    case 'add':
        UsersController\addAction();
        break;
    case 'delete':
        UsersController\deleteAction($connexion, $_GET['id']);
        break;
    case 'editForm':
        UsersController\editFormAction($connexion, $_GET['id']);
        break; 
    case 'edit':
        UsersController\editAction($connexion, [
            'id'   => $_GET['id'],
            'name' => $_POST['name']
        ]);
        break;   
    case 'create':
        UsersController\createAction($connexion, $_POST);
        break;
    default:
        UsersController\indexAction($connexion);
        break;
endswitch;
