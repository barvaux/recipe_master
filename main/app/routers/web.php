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

// CATEGORIES: ROUTER DES ENTREES
// PATTERN: ?categories=entrees
elseif (isset($_GET['entrees'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\entreesAction($connexion);

// CATEGORIES: ROUTER DES PLATS PRINCIPAUX
// PATTERN: ?categories=platsPrincipaux
elseif (isset($_GET['platsPrincipaux'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\platsPrincipauxAction($connexion);

// CATEGORIES: ROUTER DES DESSERTS
// PATTERN: ?categories=desserts
elseif (isset($_GET['desserts'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\dessertsAction($connexion);

// CATEGORIES: ROUTER DES PLATS VEGETARIEN
// PATTERN: ?categories=vegetarien
elseif (isset($_GET['vegetarien'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\vegetarienAction($connexion);

// CATEGORIES: ROUTER DES PLATS VEGAN
// PATTERN: ?categories=vegan
elseif (isset($_GET['vegan'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\veganAction($connexion);

// INGREDIENTS: ROUTER DES PLATS AU POULET
// PATTERN: ?categories=poulet
elseif (isset($_GET['poulet'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\pouletAction($connexion);

// INGREDIENTS: ROUTER DES PLATS AU BOEUF
// PATTERN: ?categories=boeuf
elseif (isset($_GET['boeuf'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\boeufAction($connexion);

// INGREDIENTS: ROUTER DES PLATS AU POISSON
// PATTERN: ?categories=poisson
elseif (isset($_GET['poisson'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\poissonAction($connexion);

// INGREDIENTS: ROUTER DES PLATS AU LEGUMES
// PATTERN: ?categories=legumes
elseif (isset($_GET['legumes'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\legumesAction($connexion);

// INGREDIENTS: ROUTER DES PLATS AU FROMAGE
// PATTERN: ?categories=fromage
elseif (isset($_GET['fromage'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\fromageAction($connexion);

// PATTERN: /
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
