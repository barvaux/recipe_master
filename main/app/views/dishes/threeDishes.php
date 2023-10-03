<section>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Boucle pour afficher les recettes populaires -->
        <?php foreach ($threePopularDishes as $dish): ?>
            <article class="bg-white rounded-lg overflow-hidden shadow-lg relative">
                <img class="w-full h-48 object-cover" src="<?php echo $dish['dish_picture']; ?>" alt="<?php echo $dish['dish_name']; ?>" />
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2"><?php echo $dish['dish_name']; ?></h3>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                        <span><?php echo $dish['average_rating']; ?></span>
                    </div>
                    <p class="text-gray-600">
                        <?php echo strlen($dish['dish_description']) > 100 ? substr($dish['dish_description'], 0, 100) . '...' : $dish['dish_description']; ?>
                    </p>
                    <div class="flex items-center mt-4">
                        <span class="text-gray-700 mr-2">Par <?php echo $dish['user_name']; ?></span>
                        <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $dish['comment_count']; ?> commentaires</span>
                    </div>
                    <a href="recipe.html" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                        Voir la recette
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
