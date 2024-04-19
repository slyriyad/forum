<?php
    $topics = $result["data"]['topics']; 
    $category = $result["data"]['category']; 
?>

<h1 style="font-size:5vw;text-align: center;color: black;margin:5% 0%"><?= $category->getName()?></h1>
<ul class="list-group">
<?php
foreach($topics as $topic ){ ?>
    <li class="list-group-item"><p><a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a> par <a href="#"><?= $topic->getUser() ?></a> <?php $date = new DateTime($topic->getCreationDate());
        // Formater la date
        $formattedDate = $date->format('d/m/Y H:i:s');?> <?=$formattedDate?></p>
    
<?php } ?>
</ul>
<div class="my-3 p-3 bg-white rounded box-shadow">
  <div style="margin:0%;width:98vw">
    <div class="row" style="display:flex;justify-content:center;margin:2% 0%">
		<div style="width:97%;border:1px solid gray;background-color:RGB(248,248,248);padding:2%;border-radius:15px">
            <div class="panel panel-default">
                <div class="panel-body"> 
                    <h3 style="text-align:center">Nouveau topic</h3>               
                    <form accept-charset="UTF-8" action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>" method="POST">
                        <label for="title" class="form-label">Titre</label>    
                        <input class="form-control" type="text" name="title" placeholder="Titre">    
                        <label for="text" class="form-label">Post</label>    
                        <textarea class="form-control counted" name="text" placeholder="Type in your message" rows="5" style="margin-bottom:10px;"></textarea>
                        <h6 class="pull-right" id="counter" style="color:white">320 characters remaining</h6>
                        <button class="btn btn-dark" value="add" type="submit" name="add">Post New Message</button>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>

