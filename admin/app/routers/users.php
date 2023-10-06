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