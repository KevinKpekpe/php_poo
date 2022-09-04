<h4><?= $params['tag']->name ?></h4>
<div class="row">
<?php foreach($params['tag']->getPosts() as $post) : ?>
    <div class="col-md-3">
    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $post->title ?></h2>
            <div>
            <span class="badge bg-primary"> <a href="/tags/<?= $params['tag']->id?>" class="text-white"><?= $params['tag']->name ?></a></span>
            </div>
            <small class=" text-primary">Publié le <?= $post->created_at ?></small>
            <p> <?= $post->content ?></p>
            <a href="/posts/<?= $post->id ?>" class="btn btn-primary">Lire Plus</a>
            </div>
        </div>
    </div>
    </div>
<?php endforeach ?>  

</div>
  