<?php

/** @var $post array */
?>
<div class="row mt-3" id="post_<?= $post['id'] ?>">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= ucfirst($post['title']) ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">ID de usuario: <?= $post['userId'] ?></h6>
                <p class="card-text"><?= ucfirst($post['body']) ?></p>
            </div>
        </div>
    </div>
</div>