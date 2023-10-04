<?php

// ROUTER PRINCIPAL

// USERS: ROUTER DES USERS
// PATTERN: ?users=xxx
if (isset($_GET['users'])) :
    include_once '../app/routers/users.php';

// BOOKS: ROUTER DES DISHES
// PATTERN: ?dishes=xxx
elseif (isset($_GET['dishes'])) :
    include_once '../app/routers/dishes.php';

// ROUTE DES RECETTES
// PATTERN: ?recipes=xxx
elseif (isset($_GET['recipes'])) :
    include_once '../app/controllers/recipesController.php';
    \App\Controllers\RecipesController\latestRecipesAction($connexion);

// CHEFS: ROUTER DES CHEFS
// PATTERN: ?chefs=xxx
elseif (isset($_GET['chefs'])) :
    include_once '../app/routers/chefs.php';

// PATTERN: /
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
