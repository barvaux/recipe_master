<h2 class="font-bold text-lg mb-4">Ingrédients</h2>
<ul class="list-reset text-gray-100">
    <?php foreach ($ingredients as $ingredient): ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-600 px-2 block" href="ingredients/<?php echo $ingredient['id']; ?>">
                <?php echo $ingredient['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
