<aside class="w-full md:w-1/4 p-3">
    <div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 mb-4"> 
        <?php  
              include_once '../app/controllers/categoriesController.php';
              \App\Controllers\CategoriesController\indexAction($connexion);
          ?>
        </ul>
    </div>
    <div class="bg-yellow-600 text-white rounded-lg shadow-md p-4">
        <?php  
              include_once '../app/controllers/ingredientsController.php';
              \App\Controllers\IngredientsController\indexAction($connexion);
          ?>
    </div>
</aside>
