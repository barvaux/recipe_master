<!-- List of Latest Chefs -->

<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
    <h2 class="text-3xl font-bold mb-4">Les 9 derniers chefs</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($latestUsers as $user): ?>
            <div class="border rounded-lg overflow-hidden">
                <img
                    class="w-full h-48 object-cover"
                    src="/public/pictures/<?php echo $user['user_picture']; ?>"
                    alt="<?php echo $user['user_name']; ?>"
                />
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2"><?php echo $user['user_name']; ?></h3>
                    <p class="text-gray-700"><?php echo $user['user_biography']; ?></p>
                    
                    <div class="flex items-center mt-2">
                        <span class="text-gray-700 mr-2">Membre depuis <?php echo $user['registration_date']; ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
