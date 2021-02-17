<h1>Mes articles :</h1>
<div class="offset-md-1 col-md-10">
    <?php foreach ($posts as $post): ?>
        <a href="/post/<?= $post->id ?>" class="text-capitalize btn btn-primary">
            <?= $post->title ?>
        </a>
    <?php endforeach; ?>
</div>
