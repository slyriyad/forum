<!-- <h1>Se connecter</h1>

<form action="index.php?ctrl=security&action=login" method="post">
    <label for="name">E-mail:</label><br>
    <input type="email" placeholder="mail" name="mail"><br>


    <label for="name">Password:</label><br>
    <input type="password" placeholder="Password" name="password"><br>
    <input type="submit" value="connexion" class="bouton" name="connexion">
</form> -->


<div style="display:flex;flex-direction:column;justify-content:center;align-items:center; height:100%;padding:5%;">
    <h2>Se connecter</h2>
<div style="width:50%">
<form action="index.php?ctrl=security&action=login" method="post" style="padding:5%;margin-bottom:5%;border-radius:5px;background-color:rgb(0,0,0);color:rgb(255, 255, 255)">
  <div class="form-group">
    <label for="mail">Email address:</label>
    <input type="email" class="form-control" name="mail" placeholder="">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="">
  </div>
  <input type="submit" value="Envoyer" class="btn btn-light" name="connexion" style="margin-top:5%">
</form>
</div>