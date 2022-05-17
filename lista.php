<?php
require_once('common.php');
	checkUser();
	?>
<!DOCTYPE html>
<html>
<title>mensaje</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3css/w3.css">
<link rel="stylesheet" href="w3css/w3pro.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<form action="rlista.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<h2 class="w3-center">profile</h2>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
   <p class="w3-center"><img src="img/<?php echo $_SESSION['userName']; ?>.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar"> <br>   <?php echo $_SESSION['userName']; ?></p>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="fa fa-leanpub" style="font-size:36px"></i></div>
    <div class="w3-rest">

    </div>

<div class="w3-col" style="width:50px"><i class="fa fa-check-square-o" style="font-size:36px;"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="mensaje" type="text" placeholder="edad:">
    </div>

<div class="w3-col" style="width:50px"><i class="fa fa-check-square-o" style="font-size:36px;"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="mensaje1" type="text" placeholder="sexo">
    </div>

<div class="w3-col" style="width:50px"><i class="fa fa-check-square-o" style="font-size:36px;"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="mensaje2" type="text" placeholder="descripcion:">
    </div>

<div class="w3-col" style="width:50px"><i class="fa fa-check-square-o" style="font-size:36px;"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="mensaje3" type="text" placeholder="frase preferida:">
    </div>
<div class="w3-col" style="width:50px"><i class="fa fa-check-square-o" style="font-size:36px;"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="mensaje4" type="text" placeholder="intereses:">
    </div>

<div class="w3-col" style="width:50px"><i class="fa fa-check-square-o" style="font-size:36px;"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="mensaje5" type="text" placeholder="actitud filosofica:">
    </div>

</div>


<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>

</form>

</body>
</html> 
