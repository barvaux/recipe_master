<aside class="w-full md:w-1/4 p-3">
    <div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 mb-4"> 
        <?php  
              include_once '../app/controllers/categoriesController.php';
              \App\Controllers\CategoriesController\indexAction($connexion);
          ?>
        </ul>
    </div>
    <div class="bg-yellow-600 text-white rounded-lg shadow-md p-4">
        <h2 class="font-bold text-lg mb-4">Ingrédients</h2>
        <ul class="list-reset text-gray-200">
            <li>
                <a class="hover:text-white hover:bg-yellow-700 px-2 block" href="index.php?poulet">Poulet</a>
            </li>
            <li>
                <a class="hover:text-white hover:bg-yellow-700 px-2 block" href="index.php?boeuf">Boeuf</a>
            </li>
            <li>
                <a class="hover:text-white hover:bg-yellow-700 px-2 block" href="index.php?poisson">Poisson</a>
            </li>
            <li>
                <a class="hover:text-white hover:bg-yellow-700 px-2 block" href="index.php?legumes">Légumes</a>
            </li>
            <li>
                <a class="hover:text-white hover:bg-yellow-700 px-2 block" href="index.php?fromage">Fromage</a>
            </li>
        </ul>
    </div>
</aside>
