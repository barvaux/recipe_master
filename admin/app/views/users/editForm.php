<div class="page-header">
    <h1>MODIFICATION D'UN UTILISATEUR</h1>
</div>
<form action="users/edit/<?php echo $user['id']; ?>" method="post">
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $user['name']; ?>" />
    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
