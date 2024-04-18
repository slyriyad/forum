<?php
    $posts = $result["data"]['posts']; 
    $topic = $result["data"]['topic']; 


    
?>

<div class="my-3 p-3 bg-white rounded box-shadow">
  <h6 class=" border-black pb-2 mb-0"><h1 style="text-align: center;color: black"><?= $topic->getTitle(); ?></h1></h6>
  <?php foreach( $posts as $post ) { ?>
    <div class="card gedf-card" style="margin-top:5%">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ml-2">
                    <div class="h5 m-0">@<?= $post->getUser() ?></div>
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
    <div class="card-footer" >
        <a href="#" class="card-link" style="color:rgb(0,0,0)"><i class="fa fa-comment"></i> Comment</a>
    </div> 
</div>
            <?php } ?>
          </p>
        </div>
      </div>

