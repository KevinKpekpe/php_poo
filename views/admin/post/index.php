<h1 class=" text-white badge bg-danger">Administration des Articles</h1>
<br>

<?php if(isset($_GET['success'])):?>
    <div class="alert alert-success">Vous êtes connecté</div>
<?php endif ?>
<a href="/admin/posts/create" class="btn btn-success my-3">Un nouvel article</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Publié le</th>
            <th scope="col">Actions</th>
            
        </tr>
    </thead>
    <tbody>
       <?php foreach($params['posts'] as $post) :?>
        <tr>
            <td scope="row"><?= $post->id ?></td>
            <td><?= $post->title ?></td>
            <td><?= $post->getCreatedAt() ?></td>
            <td>
                <a href="/admin/posts/edit/<?= $post->id ?>" class="btn btn-warning">Modifier</a>
                <form action="/admin/posts/delete/<?= $post->id ?>" method="post" style="display: inline">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                
            </td>
        </tr>
       <?php endforeach ?>
    </tbody>
</table>