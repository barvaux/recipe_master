<div class="page-header">
    <h1>MODIFICATION D'UNE CATÉGORIE</h1>
</div>
<form action="categories/edit/<?php echo $categorie['id']; ?>" method="post">
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $categorie['name']; ?>" />
    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
 