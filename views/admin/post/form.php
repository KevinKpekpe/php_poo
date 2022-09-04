<h1>Formulaire de Modification <?= $params['post']->title ?? 'Creer un nouvel article' ?></h1>
<form action="<?= isset($params['post']) ? "/admin/posts/edit/{$params['post']->id}" : "/admin/posts/create" ?>" method="post">
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" name="title" value="<?= $params['post']->title ?? '' ?>"id="" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Contenu de L'article</label>
        <textarea name="content" class="form-control" id="content" cols="30" rows="10"> <?= $params['post']->content ?? ''?></textarea>
    </div>
    <div class="form-group">
        <div class="form-group">
          <label for="tags">Tags de l'article</label>
          <select multiple class="form-control" name="tags[]" id="tags">
            <?php foreach($params['tags'] as $tag):?>
                <option value="<?= $tag->id ?>"
              <?php if(isset($params['post'])):?>
                <?php foreach($params['post']->getTags() as $postTags)
                echo ($tag->id === $postTags->id ? 'selected' : '');
                ?>
              <?php endif?>
                ><?= $tag->name ?></option>
            <?php endforeach;?>
          </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2"><?= isset($params['post']) ? 'Valider Les Changements' : 'Enregistrer'?></button>
</form>