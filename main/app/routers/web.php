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

// CATEGORIES: ROUTER DES PLAT FRANCAIS
// PATTERN: ?categories=francaise
elseif (isset($_GET['francaise'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\francaiseAction($connexion);

// CATEGORIES: ROUTER DES PLATS ITALIEN
// PATTERN: ?categories=italienne
elseif (isset($_GET['italienne'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\italienneAction($connexion);

// CATEGORIES: ROUTER DES JAPONAISE
// PATTERN: ?categories=japonaise
elseif (isset($_GET['japonaise'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\japonaiseAction($connexion);

// CATEGORIES: ROUTER DES PLATS MEXICAIN
// PATTERN: ?categories=mexicaine
elseif (isset($_GET['mexicaine'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\mexicaineAction($connexion);

// CATEGORIES: ROUTER DES PLATS INDIEN
// PATTERN: ?categories=indienne
elseif (isset($_GET['indienne'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\indienneAction($connexion);

// CATEGORIES: ROUTER DES PLATS CHINOIS
// PATTERN: ?categories=chinoise
elseif (isset($_GET['chinoise'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\chinoiseAction($connexion);

// CATEGORIES: ROUTER DES PLATS MEDITERRANEEN
// PATTERN: ?categories=mediterraneenne
elseif (isset($_GET['mediterraneenne'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\mediterraneenneAction($connexion);

// CATEGORIES: ROUTER DES PLATS AFRICAIN
// PATTERN: ?categories=africaine
elseif (isset($_GET['africaine'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\africaineAction($connexion);

// CATEGORIES: ROUTER DES PLATS AMERICAIN
// PATTERN: ?categories=americaine
elseif (isset($_GET['americaine'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\americaineAction($connexion);

// CATEGORIES: ROUTER DES PLATS THAILANDAIS
// PATTERN: ?categories=thailandaise
elseif (isset($_GET['thailandaise'])) :
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\thailandaiseAction($connexion);




// INGREDIENTS: ROUTER DES PLATS AU POULET
// PATTERN: ?ingredients=poulet
elseif (isset($_GET['poulet'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\pouletAction($connexion);

// INGREDIENTS: ROUTER DES PLATS AU BOEUF
// PATTERN: ?ingredients=boeuf
elseif (isset($_GET['boeuf'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\boeufAction($connexion);

// INGREDIENTS: ROUTER DES PLATS AU POISSON
// PATTERN: ?ingredients=poisson
elseif (isset($_GET['poisson'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\poissonAction($connexion);

// INGREDIENTS: ROUTER DES PLATS AU LEGUMES
// PATTERN: ?ingredients=legumes
elseif (isset($_GET['legumes'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\legumesAction($connexion);

// INGREDIENTS: ROUTER DES PLATS AU FROMAGE
// PATTERN: ?ingredients=fromage
elseif (isset($_GET['fromage'])) :
    include_once '../app/controllers/ingredientsController.php';
    \App\Controllers\IngredientsController\fromageAction($connexion);

// PATTERN: /
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
