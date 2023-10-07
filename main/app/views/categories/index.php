<h2 class="font-bold text-lg mb-4">Catégories</h2>
<ul class="list-reset text-gray-100">
    <?php foreach ($categories as $category): ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-600 px-2 block" href="categories/<?php echo $category['id']; ?>">
                <?php echo $category['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
