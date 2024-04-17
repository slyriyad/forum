<?php
    $posts = $result["data"]['posts']; 
    $topic = $result["data"]['topic']; 


    
?>



<div class="lh-100">
  
  
  </div>
</div>

<div class="my-3 p-3 bg-white rounded box-shadow">
  <h6 class="border-top border-black pb-2 mb-0"><h1 style="text-align: center;color: black"><?= $topic->getTitle(); ?></h1>Post</h6>
  <?php foreach( $posts as $post ) { ?>
        <div class="media text-muted pt-3">
          
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><?= $post->getUser(); ?></strong>
            <?= $post->getText(); ?>
            <?php } ?>
          </p>
        </div>
      </div>

