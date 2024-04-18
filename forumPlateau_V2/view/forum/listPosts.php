<?php
    $posts = $result["data"]['posts']; 
?>

<h1>Liste des posts</h1>

<?php
foreach($posts as $post ){ ?>
<div class="card gedf-card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mr-2">
                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                </div>
                <div class="ml-2">
                    <div class="h5 m-0"><?= $post->getUser() ?></div>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i><?= $post->getCreationDate() ?></div>
        <p class="card-text">
        <?= $post->getText() ?>
        </p>
    </div>
    <div class="card-footer">
        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
    </div>
</div>
<!-- Post /////-->
<?php }

