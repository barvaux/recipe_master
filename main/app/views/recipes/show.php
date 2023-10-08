<!-- List of Latest Recipes -->
    
<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
    <h2 class="text-3xl font-bold mb-4">Les 9 dernières recettes</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php foreach ($latestDishes as $recipe): ?>
        <div class="border rounded-lg overflow-hidden">
          <img
            class="w-full h-48 object-cover"
            src="<?php echo $recipe['dish_picture']; ?>"
            alt="<?php echo $recipe['dish_name']; ?>"
          />
          <div class="p-4">
            <h3 class="text-xl font-semibold mb-2"><?php echo $recipe['dish_name']; ?></h3>
            <p class="text-gray-700">
              <?php echo strlen($recipe['dish_type_description']) > 100 ? substr($recipe['dish_type_description'], 0, 100) . '...' : $recipe['dish_type_description']; ?>
            </p>

            <div class="flex items-center mt-4">
              <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
              <span><?php echo $recipe['average_rating']; ?></span>
              <span class="ml-4 text-gray-700"><i class="fas fa-clock"></i> <?php echo $recipe['preparation_time']; ?> minutes</span> 
            </div>
            <!-- Ingredients -->
            <div class="p-4 border-t">
                <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
                <ul id="ingredientList" class="list-disc pl-5">
                    <?php 
                    $ingredients = explode(', ', $recipe['ingredient_names']);
                    $quantities = explode(', ', $recipe['ingredient_quantities']); // Tableau des quantités
                    
                    for ($i = 0; $i < count($ingredients); $i++) :
                        $ingredient = $ingredients[$i];
                        $quantity = isset($quantities[$i]) ? $quantities[$i] : ''; // Obtenir la quantité correspondante ou une chaîne vide si elle n'existe pas
                        
                        // Afficher l'ingrédient et sa quantité
                        echo '<li>' . $quantity . ' ' . $ingredient . '</li>';
                        
                        // Définir le nombre maximal d'ingrédients à afficher
                        $maxIngredients = 2;
                        
                        // Arrêter d'afficher les ingrédients supplémentaires une fois que $i atteint $maxIngredients
                        if ($i >= $maxIngredients) {
                            break;
                        }
                    endfor;
                    ?>
                </ul>
            </div>


            <!-- Steps -->
            <div class="p-4 border-t">
                <h2 class="text-2xl font-bold mb-4">Étapes</h2>
                <ol class="list-decimal pl-5">
                <p class="text-gray-700">
                  <?php echo strlen($recipe['dish_description']) > 100 ? substr($recipe['dish_description'], 0, 100) . '...' : $recipe['dish_description']; ?>
                </p>
                </ol>
            </div>
            <div class="flex items-center mt-2">
              <span class="text-gray-700 mr-2">Par <?php echo $recipe['user_name']; ?></span>
              <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $recipe['comment_count']; ?> commentaires</span>
            </div>  
            <!-- Comments -->
            <div class="p-4 border-t">
                <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
                <?php if (!empty($recipe['comments'])) : ?>
                    <?php foreach ($recipe['comments'] as $comment) : ?>
                        <div class="mb-4">
                            <!-- Affichez les commentaires ici, par exemple : -->
                            <div class="flex items-center mb-2">
                                <img
                                  src="https://picsum.photos/50/50"
                                  alt="<?php echo $comment['comment_username']; ?>"
                                  class="w-10 h-10 rounded-full mr-2"
                                />
                                <span class="font-bold"><?php echo $comment['comment_username']; ?></span>
                            </div>
                            <p class="text-gray-700"><?php echo $comment['comment_content']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-gray-700">Aucun commentaire pour cette recette.</p>
                <?php endif; ?>
            </div>

            
            <a href="#" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                Voir la recette
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
</section>
