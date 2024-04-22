<?php
    $post = $result["data"]['post']; 
?>

<form action="index.php?ctrl=forum&action=updatePost&id=<?= $post->getId() ?>" method="POST">
    <label for="text">Texte :</label><br>
    <input type="text" value="<?= $post->getText() ?>" name="text"><br>
    <button type="submit" name="update">Mettre à jour</button>
</form>