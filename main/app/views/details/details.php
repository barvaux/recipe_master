<!-- Details of Recipe -->
<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
    <h2 class="text-3xl font-bold mb-4">Détails de la recette</h2>
    <div class="border rounded-lg overflow-hidden">
        <img
            class="w-full h-48 object-cover"
            src="<?php echo $recipeDetails['dish_picture']; ?>"
            alt="<?php echo $recipeDetails['dish_name']; ?>"
        />
        <div class="p-4">
            <h3 class="text-xl font-semibold mb-2"><?php echo $recipeDetails['dish_name']; ?></h3>
            <p class="text-gray-700">
                <?php echo $recipeDetails['dish_description']; ?>
            </p>

            <div class="flex items-center mt-4">
                <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                <span><?php echo $recipeDetails['average_rating']; ?></span>
            </div>
            <div class="flex items-center mt-2">
                <span class="text-gray-700 mr-2">Par <?php echo $recipeDetails['user_name']; ?></span>
                <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $recipeDetails['comment_count']; ?> commentaires</span>
            </div>
        </div>
    </div>
</section>
