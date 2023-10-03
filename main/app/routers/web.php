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

// // AUTHORS.: ROUTER DES AUTHORS
// // PATTERN: ?authors=xxx
// elseif (isset($_GET['authors'])) :
//     include_once '../app/routers/authors.php';

// PATTERN: /
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
?>
