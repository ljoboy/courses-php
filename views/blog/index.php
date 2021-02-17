<h1>Mes articles :</h1>
<div class="offset-md-1 col-md-10">
    <?php foreach ($posts as $post): ?>
        <div class="card">
            <h2 class="text-capitalize"><?= $post->title ?></h2>
            <small class="float-xs-right">
                <?= $post->created_at ?>
            </small>
        </div>
    <?php endforeach; ?>
</div>
