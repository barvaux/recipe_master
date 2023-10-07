<?php

// ROUTE DES CATÉGORIES
// PATTERN: ?categories=xxx
// ROUTER: categories
if (isset($_GET[('categories')])) :
    include_once '../app/routers/categories.php';

// ROUTE DES USERS
// PATTERN: ?users=xxx
// ROUTER: users
elseif (isset($_GET[('users')])) :
    include_once '../app/routers/users.php';

// ROUTE DES RECIPES
// PATTERN: ?recipes=xxx
// ROUTER: recipes
elseif (isset($_GET[('recipes')])) :
    include_once '../app/routers/recipes.php';


else :
    include_once '../app/controllers/usersController.php';
    \App\Controllers\UsersController\dashboardAction($connexion);
endif;