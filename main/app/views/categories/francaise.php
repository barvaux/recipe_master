
<section>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Boucle pour afficher les recettes d'entrées -->
        <?php foreach ($francaise_recipes as $recipe): ?>
            <article class="bg-white rounded-lg overflow-hidden shadow-lg relative">
                <img class="w-full h-48 object-cover" src="<?php echo $recipe['dish_picture']; ?>" alt="Image de recette" />
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2"><?php echo $recipe['dish_name']; ?></h3>
                    <!-- Note moyenne (à adapter avec vos données) -->
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                        <span class="text-gray-600"><?php echo $recipe['average_rating']; ?></span>
                    </div>
                    <p class="text-gray-600">
                        <?= strlen($recipe['dish_description']) > 100 ? substr($recipe['dish_description'], 0, 100) . '...' : $recipe['dish_description'] ?>
                    </p>
                    <!-- Informations supplémentaires (à adapter avec vos données) -->
                    <!-- <div class="flex items-center mt-4">
                        <span class="text-gray-700 mr-2">Par Jean Dupont</span>
                        <span class="text-gray-500"><i class="fas fa-comment"></i> 12 commentaires</span>
                    </div> -->
                    <!-- Lien vers la page de la recette complète -->
                    <a href="recipe.html" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                        Voir la recette
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
