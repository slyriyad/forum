<!-- <h1>S'inscrire</h1>

<form action="index.php?ctrl=security&action=addRegister" method="post">
    <label for="name">NickName:</label><br>
    <input type="text" placeholder="Nickname" name="nickName"><br>


    <label for="name">E-mail:</label><br>
    <input type="text" placeholder="E-mail" name="mail"><br>


    <label for="name">Password:</label><br>
    <input type="password" placeholder="password" name="password"><br>


    <label for="name"> Confirm Password:</label><br>
    <input type="password" placeholder="password" name="password2"><br>
    
    <input type="submit" value="add" class="bouton" name="add">

    
</form> -->
<div style="display:flex;flex-direction:column;justify-content:center;align-items:center; height:100%;padding:5%;">
    <h2>S'inscrire</h2>
<div style="width:50%">
<form action="index.php?ctrl=security&action=addRegister" method="post" style="padding:5%;margin-bottom:5%;border-radius:5px;background-color:rgb(0,0,0);color:rgb(255, 255, 255)">
  <div class="col-md-2" >
    <label for="nickName" class="form-label">Pseudo:</label>
    <input class="form-control" type="text" name="nickName" placeholder="">
  </div>
  <div class="form-group">
    <label for="mail">Email address:</label>
    <input type="email" class="form-control" name="mail" placeholder="">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="">
  </div>
  <div class="form-group">
    <label for="password2">Password:</label>
    <input type="password" class="form-control" name="password2" placeholder="">
  </div>
  <input type="submit" value="Envoyer" class="btn btn-light" name="add" style="margin-top:5%">
</form>
</div>