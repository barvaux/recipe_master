<div class="page-header">
    <h1>MODIFICATION D'UNE RECETTE</h1>
</div>
<form action="recipes/edit/<?php echo $recipe['id']; ?>" method="post">
    <div>
        <label for="name">Nom de la recette</label>
        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $recipe['name']; ?>" />
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description"><?php echo $recipe['description']; ?></textarea>
    </div>
    <div>
        <label>Ingrédients :</label>
        <?php foreach ($ingredients as $ingredient): ?>
            <label>
                <input type="checkbox" name="ingredients[]" value="<?php echo $ingredient['id']; ?>">
                <?php echo $ingredient['name']; ?>
            </label>
        <?php endforeach; ?>
    </div>
        <div>
        <label for="category_id">Catégorie de recette</label>
        <select id="type_id" name="type_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $recipe['type_id']) ? 'selected' : ''; ?>>
                    <?php echo $category['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="user_id">Attribuer à l'utilisateur</label>
        <select id="user_id" name="user_id">
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['id']; ?>" <?php echo ($user['id'] == $recipe['user_id']) ? 'selected' : ''; ?>>
                    <?php echo $user['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
