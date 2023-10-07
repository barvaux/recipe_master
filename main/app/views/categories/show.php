<section>
    <h2 class="text-2xl font-bold mb-4">Les recettes de la catégorie <?php echo $categorie['name']; ?></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($recipes as $recipe): ?>
            <!-- Recipe Card -->
            <article class="bg-white rounded-lg overflow-hidden shadow-lg relative">
            <img class="w-full h-48 object-cover" src="<?php echo $recipe['dish_picture']; ?>" alt="Image de recette" />
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2"><?php echo $recipe['dish_name']; ?></h3>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                        <span><?php echo $recipe['average_rating']; ?></span>
                    </div>
                    <p class="text-gray-600">
                    <?= strlen($recipe['dish_description']) > 100 ? substr($recipe['dish_description'], 0, 100) . '...' : $recipe['dish_description'] ?>
                    </p>
                    <a href="recipe.html" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">Voir la recette</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
