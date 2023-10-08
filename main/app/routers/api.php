<?php

if (isset($_GET['recipes'])) :
    switch ($_GET['recipes']):
        default:
            include_once '../app/controllers/recipesController.php';
            \App\Controllers\RecipesController\api_indexAction($connexion);
            break;
    endswitch;
else :
endif;