<h1>Titre: <?= $post->title ?></h1>
<div>
    <?= $post->content ?>
    <div>
        <?php foreach ($post->getTags() as $tag): ?>
        <span class="tag tag-info"><?= $tag->name ?></span>
        <?php endforeach; ?>
    </div>
</div>
<hr/>
<small><?= strtoupper($post->formattedCreatedAt()) ?></small>
