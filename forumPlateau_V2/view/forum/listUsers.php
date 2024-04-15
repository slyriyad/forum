<?php
    $users = $result["data"]['users']; 
?>

<h1>Liste des utilisateurs</h1>
<ul class="list-group">
<?php
foreach($users as $user ){ ?>
    <li class="list-group-item"><p><?= $user->getNickName() ?></p>
        <form action="index.php?ctrl=forum&action=delUser" method="post">
            <input type="hidden" name="supUser" value="<?= $user->getId() ?>">
            <input type="submit" class="btn btn-danger" name="del" value ="Supprimer">
        </form>
    </li>
<?php }


  
