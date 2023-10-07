<div class="page-header">
    <h1>MODIFICATION D'UNE RECETTE</h1>
</div>
<form action="recipes/edit/<?php echo $recipe['id']; ?>" method="post">
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $recipe['name']; ?>" />
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description"><?php echo $recipe['description']; ?></textarea>
    </div>
    <div>
        <label for="user_id">User ID</label>
        <input type="text" id="user_id" name="user_id" placeholder="User ID" value="<?php echo $recipe['user_id']; ?>" />
    </div>
    <div>
        <label for="type_id">Type ID</label>
        <input type="text" id="type_id" name="type_id" placeholder="Type ID" value="<?php echo $recipe['type_id']; ?>" />
    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
