
<h4 class="badge bg-danger  text-center">Les Derniers Articles</h4>
<div class="row">
<?php foreach($params['posts'] as $post): ?>
<div class="col-md-3">
<div class="card mb-3">
    <div class="card-body">
    <h2><?= $post->title ?></h2>
    <div>
    <?php foreach ($post->getTags() as $tag): ?>
        <span class="badge bg-primary"> <a href="/tags/<?= $tag->id ?>" class="text-white"><?= $tag->name ?></a></span>
    <?php endforeach ?>
    </div>
    <small class=" text-primary">Publié le <?= $post->getCreatedAt() ?></small>
    <p><?= $post->getExcerpt() ?></p>
    <?= $post->getButton() ?>
    </div>
</div>
</div>
<?php endforeach ;?>
</div>


