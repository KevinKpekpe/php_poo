<h1> <?= $params['post']->title;?></h1>
<div>
    <?php foreach ($params['post']->getTags() as $tag): ?>
        <span class="badge bg-primary"><?= $tag->name ?></span>
    <?php endforeach ?>
    </div>
<p> <?= $params['post']->content;?></p>
<a href="/posts" class="btn btn-primary">Revenir</a>