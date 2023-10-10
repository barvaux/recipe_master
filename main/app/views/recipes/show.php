<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <!-- Recipe Image -->
        <img
            class="w-full h-96 object-cover rounded-t-lg"
            src="<?php echo $recipe['dish_picture']; ?>"
            alt="Nom de la recette"/>

          <!-- Recipe Info -->
        <div class="p-4">
            <h1 class="text-3xl font-bold mb-4"><? echo $recipe['dish_name'];?></h1>
            <div class="flex items-center mb-4">
              <span class="text-yellow-500 mr-1"
                ><i class="fas fa-star"></i
              ></span>
              <span><?php echo $recipe['notations']; ?></span>
              <span class="ml-4 text-gray-700"
                ><i class="fas fa-clock"></i> <? echo $recipe['preparation_time']; ?></span
              >
            </div>
            <p class="text-gray-700 mb-4">
            <? echo $recipe['category_description']; ?>
            </p>
            <div class="flex items-center mb-4">
              <span class="text-gray-700 mr-2">Par <? echo $recipe['user_name']; ?></span>
              <span class="text-gray-500"
                ><i class="fas fa-comment"></i> <? echo $recipe['comment_count']; ?> commentaires</span
              >
            </div>
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
                    endfor;
                    ?>
                </ul>
            </div>
        <!-- Steps -->
        <!-- Steps -->
            <div class="p-4 border-t">
                <h2 class="text-2xl font-bold mb-4">Étapes</h2>
                <ul class="list-decimal pl-5">
                    <?php
                    $description = $recipe['dish_description'];
                    $steps = explode('.', $description);

                    foreach ($steps as $step) :
                        // Supprimer les espaces inutiles au début et à la fin de la phrase
                        $step = trim($step);

                        // Si la phrase n'est pas vide, l'ajouter comme un élément de liste
                        if (!empty($step)) {
                            echo '<li>' . $step . '</li>';
                        }
                    endforeach;
                    ?>
                </ul>
            </div>
        <!-- Comments -->
        <div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
            <!-- Comment -->
            <div class="mb-4">
              <div class="flex items-center mb-2">
                <img
                  src="https://source.unsplash.com/50x50/?portrait"
                  alt="Nom de l'utilisateur"
                  class="w-10 h-10 rounded-full mr-2"
                />
                <span class="font-bold"><?php echo $recipe['comment_username'];?></span>
              </div>
              <p class="text-gray-700">
              <? echo $recipe['comments']; ?>
              </p>
            </div>
            <!-- ... (autres commentaires) ... -->
          </div>
        </section>