<?php if(isset($_SESSION['errors'])):?>
    <?php foreach($_SESSION['errors'] as $errorArray):?>
        <div class="alert alert-danger">
            <?=$errorArray[0]?>
        </div>
    <?php endforeach ?>
<?php endif ?>
<?php session_destroy()?>
<h1>Formulaire de Connexion</h1>
<form action="/login" method="post">
    <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Mot de Passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>