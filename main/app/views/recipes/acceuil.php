<section class="relative mb-6">
    <img
        class="w-full h-96 object-cover"
        src="<?php echo $random['dish_picture']; ?>"
        alt="Image du plat aléatoire"/>
    <div
        class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent">
        <h1 class="text-3xl font-bold mb-2 text-white">
            <?php echo $random['dish_name']; ?>
        </h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1">
                <i class="fas fa-star"></i>
            </span>
            <span class="text-white"><?php echo $random['average_rating']; ?></span>
        </div>
        <p class="text-gray-300 mb-4">
            <?php echo mb_substr($random['category_description'], 0, 100); ?><?php echo mb_strlen($random['category_description']) > 100 ? '...' : ''; ?>
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-400 mr-2"><?php echo $random['user_name']; ?></span>
            <span class="text-gray-500">
                <i class="fas fa-comment"></i> <?php echo $random['comment_count']; ?> commentaires
            </span>
        </div>
        <a href="recipes/<?php echo $random['dish_id']; ?>" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">Voir la recette</a>
    </div>
</section>
<section>
    <h2 class="text-2xl font-bold mb-4">Recettes populaires</h2>
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
                        <?php echo strlen($dish['category_description']) > 100 ? substr($dish['category_description'], 0, 100) . '...' : $dish['category_description']; ?>
                    </p>
                    <div class="flex items-center mt-4">
                        <span class="text-gray-700 mr-2">Par <?php echo $dish['user_name']; ?></span>
                        <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $dish['comment_count']; ?> commentaires</span>
                    </div>
                    <a href="recipes/<?php echo $dish['dish_id']; ?>" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">Voir la recette</a>

                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
    <div class="flex items-center mb-6">
        <!-- User Avatar -->
        <img src="public/pictures/<?php echo $mostPopularUserPicture; ?>" alt="Nom de l'utilisateur" class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4">

        <!-- User Details -->
        <div>
            <h3 class="text-2xl font-bold"><?php echo $userMostPopular['user_name']; ?></h3>
            <p class="text-gray-400">Membre depuis : <?php echo $userMostPopular['registration_date']; ?></p>
            <p class="text-gray-400">Nombre de recettes postées : <?php echo $userMostPopular['recipes_posted']; ?></p>
        </div>
    </div>

    <div class="flex justify-between items-center mb-4">
        <a href="user_recipes.html" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2">Voir mes recettes</a>
    </div>

    <div>
        <h4 class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2">Mes dernières recettes</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($UserMostPopularRecipes as $key => $recipe) : ?>
                <article class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative">
                    <img src="<?php echo $recipe['dish_picture']; ?>" alt="<?php echo  $recipe['dish_name']; ?>" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h5 class="text-lg font-bold mb-2"><?php echo $recipe['dish_name']; ?></h5>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                            <span><?php echo $UserMostPopularRecipes[$key]['rating_value']; ?></span>
                        </div>
                        <p class="text-gray-500"><?php echo substr($recipe['category_description'], 0, 100); ?> <?php echo (strlen($recipe['category_description']) > 100) ? '...' : ''; ?></p>
                        <?php if (strlen($recipe['dish_description']) > 100) : ?>
                            <a href="recipe_detail.html" class="text-yellow-500 hover:text-yellow-600 mt-2 inline-block">Lire la suite</a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
