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
            <p class="text-gray-700"><?php echo $recipe['dish_description']; ?></p>
            <div class="flex items-center mt-4">
              <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
              <span><?php echo $recipe['average_rating']; ?></span>
            </div>
            <div class="flex items-center mt-2">
              <span class="text-gray-700 mr-2">Par <?php echo $recipe['user_name']; ?></span>
              <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $recipe['comment_count']; ?> commentaires</span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
</section>