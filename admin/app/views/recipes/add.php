<h4>Formulaire d'ajout d'une recette</h4>
<form action="recipes/create" method="post">
    <div>
        <label for="name">Nom de la recette</label>
        <input type="text" id="name" name="name" placeholder="Nom de la recette" />
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Description"></textarea>
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
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
    <label for="user_id">Attribuer à l'utilisateur</label>
        <select id="user_id" name="user_id">
            <?php
            // Bouclez sur les utilisateurs pour générer les options du champ de sélection
            foreach ($users as $user) {
                echo '<option value="' . $user['id'] . '">' . $user['name'] . '</option>';
            }
            ?>
        </select>

    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
