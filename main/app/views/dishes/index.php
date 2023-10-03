<section class="relative mb-6">
    <img
        class="w-full h-96 object-cover"
        src="<?php echo $randomDish['dish_picture']; ?>"
        alt="Image du plat aléatoire"
    />
    <div
        class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
    >
        <h1 class="text-3xl font-bold mb-2 text-white">
            <?php echo $randomDish['dish_name']; ?>
        </h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1">
                <i class="fas fa-star"></i>
            </span>
            <span class="text-white"><?php echo $randomDish['average_rating']; ?></span>
        </div>
        <p class="text-gray-300 mb-4">
            <?php echo mb_substr($randomDish['dish_description'], 0, 100); ?><?php echo mb_strlen($randomDish['dish_description']) > 100 ? '...' : ''; ?>
        </p>

        <div class="flex items-center mb-4">
            <span class="text-gray-400 mr-2"><?php echo $randomDish['user_name']; ?></span>
            <span class="text-gray-500">
                <i class="fas fa-comment"></i> <?php echo $randomDish['comment_count']; ?> commentaires
            </span>
        </div>
        <a
            href="recipe.html"
            class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
        >
            Voir la recette
        </a>
    </div>
</section>
