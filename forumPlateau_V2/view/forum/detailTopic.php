<?php
$posts = $result["data"]['posts']; 
$topic = $result["data"]['topic']; 
?>

<h6 class="border-black pb-2 mb-0">
    <h1 style="font-size:5vw;text-align: center;color: RGB(0,0,0)">
        <?= $topic->getTitle() ?>
    </h1>
</h6>

<main id="forum" style="display:flex;flex-direction: column;align-content: center;justify-content: center;align-items: center;">
    <?php foreach ($posts as $post) { ?>
    <div class="card gedf-card" style="width:90%;margin:2.5% 0%">
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
            <p class="card-text">
                <?= $post->getText() ?>
            </p>
            <div class="text-muted h7 mb-2"> 
                <i class="fa fa-clock-o"></i> 
                <?php 
                $date = new DateTime($post->getCreationDate());
                // Formater la date
                $formattedDate = $date->format('d/m/Y H:i:s');
                ?> 
                <?= $formattedDate ?>
            </div>
        </div>
        <div class="card-footer" style="display:flex;justify-content: flex-end" >

                <a href="index.php?ctrl=forum&action=delPost&id=<?= $post->getId() ?>">X</a>

        </div> 
    </div>
    <?php } ?>
</main>

<?php if(App\Session::getUser()) { ?>
    <?php if(!$topic->getIsLocked()) { ?>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <div style="margin:0%;width:98vw">
                <div class="row" style="display:flex;justify-content:center;margin:2% 0%">
                    <div style="width:97%;border:1px solid gray;background-color:RGB(248,248,248);padding:2%;border-radius:15px">
                        <div class="panel panel-default">
                            <div class="panel-body">                
                                <form accept-charset="UTF-8" action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method="POST">
                                    <textarea class="form-control counted" name="text" placeholder="Type in your message" rows="5" style="margin-bottom:10px;"></textarea>
                                    <h6 class="pull-right" id="counter" style="color:white">320 characters remaining</h6>
                                    <button href="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" class="btn btn-dark" value="add" type="submit" name="add">Post New Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <p>Le topic est verrouillé, vous ne pouvez pas poster !</p>
    <?php } ?>
<?php } else { ?>
    <p>Vous devez être connecté pour poster !</p>
<?php } ?>