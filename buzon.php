<?php
	require_once('common.php');
	checkUser();
?>
<?php
    require_once('gmail.php');
    require_once('db/db_connection.php');
    $user=$_SESSION['userName']; 
    $sql = "SELECT * FROM profile ORDER BY insertdate DESC";
    $result = $MyDb->f_ExecuteSql($sql);
    $recordcount = $MyDb->f_GetSelectedRows(); 
    $personal="SELECT * FROM `profile` WHERE  `name` = '$user' AND `location` = 'personal' ORDER BY insertdate DESC";
    $resultpersonal= $MyDb->f_ExecuteSql($personal);
    $recordcount = $MyDb->f_GetSelectedRows();
	$social="SELECT * FROM `profile` WHERE  `name` = '$user' AND `location` = 'social' ORDER BY insertdate DESC";
    $resultsocial= $MyDb->f_ExecuteSql($social);
    $recordcount = $MyDb->f_GetSelectedRows();
    $laboral="SELECT * FROM `profile` WHERE `name` = '$user' AND `location` = 'laboral' ORDER BY insertdate DESC";
    $resultlaboral= $MyDb->f_ExecuteSql($laboral);
    $recordcount = $MyDb->f_GetSelectedRows();
    $proyectos="SELECT * FROM `profile` WHERE `name` = '$user' AND `location` = 'proyectos' ORDER BY insertdate DESC";
    $resultproyectos= $MyDb->f_ExecuteSql($proyectos);
    $recordcount = $MyDb->f_GetSelectedRows();
    $buzon="SELECT * FROM `profile` WHERE  `email` = '$user' ORDER BY insertdate DESC";
    $resultbuzon= $MyDb->f_ExecuteSql($buzon);
    $recordcount = $MyDb->f_GetSelectedRows();
 
 
	
	
    
?>
<?php
    
    require_once('db/db_connection.php');
	
    $user=$_SESSION['userName'];
    $profile = "SELECT * FROM profile WHERE  name='$user' AND location='profile'";
    $resultprofile = $MyDb->f_ExecuteSql($profile);
    $recordcount = $MyDb->f_GetSelectedRows(); 
    
    
?>
	
	
	<!DOCTYPE html>
<html>
<title>Springfieldface</title>
<meta charset="UTF-8">
<meta name="keywords" content="sprinfielface, red social, bart,lisa, homero">
<meta name="Description" content="la red social de sprinfielface"">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3css/w3.css">
<link rel="stylesheet" href="w3css/w3pro.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<script language="javascript" type="text/javascript" src="js/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",

});
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="w3-theme-l5">

  
   
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-user"></i><span class="w3-badge w3-right w3-small w3-green">profiles</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:400px">
      
    </div>
  </div>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">admin</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
  <a href="index.php" class="w3-bar-item w3-button">sprintfielface</a>
   <a href="profile.php" class="w3-bar-item w3-button">perfil</a>
      <a href="chat.php" class="w3-bar-item w3-button">chat</a>
	  <a href="muro.php" class="w3-bar-item w3-button">muro</a>
      <a href="mail.php" class="w3-bar-item w3-button">mail</a>
	  <a href="buzon.php" class="w3-bar-item w3-button">buzon</a>
	  <a href="logout.php" class="w3-bar-item w3-button">salir</a>
    </div>
  </div>
  <p>  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="img/user.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>
 <!-- Sidebar -->
  

	
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><?php echo $_SESSION['userName']; ?><br></h4>
         <p class="w3-center"><img src="img/<?php echo $_SESSION['userName']; ?>.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
		 <h4 class="w3-center">Buzon</h4><br>
         <?php while ($row = $MyDb->f_GetRecord($resultprofile)) { ?>
<p> <h4 class="w3-center"><?php echo $row['name']; ?></h4></p>
 <p><img src="img/<?php echo $row['name']; ?>.jpg"  alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>       
                  <p>   <?php 
                if (strlen($row['web']) > 5) echo '<a href="http://'.$row['web'].'"><img src="img/www.gif" /></a>';
                if (strlen($row['email']) > 5) echo '<a href="mailto:'.$row['email'].'"><img src="img/mail.gif" /></a>';
             ?></p>
           
           <p><?php echo $row['location']; ?></p>
           
         
         <p class="w3-border w3-padding"><?php echo nl2br($row['text']); ?></p>
        

<?php } ?>

		<div class='w3-container'>
<p>		



		 .</p>
         </div>
        </div>
      </div>
      <br>
    
	
	
	
      
   
    
      <div class="w3-row-padding">
       
          <div class="w3-container w3-card-2 w3-white w3-round w3-margin"">
            <div class="w3-container w3-padding">

  <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align">personal</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>
          
												
				
									
						<?php while ($row = $MyDb->f_GetRecord
($resultpersonal)) { ?>
<div class='w3-container w3-card-2 w3-white w3-round w3-margin'>
        	<p>para:<?php echo $row['name']; ?><img src="img/<?php echo $row['name']; ?>.jpg" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p>
         <p>de:<?php echo $row['email']; ?><img src="img/<?php echo $row['email']; ?>.jpg" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p>
		          
             <?php 
                if (strlen($row['web']) > 5) echo '<a href="http://'.$row['web'].'"><img 
src="www.gif" /></a>';
                if (strlen($row['email']) > 5) echo '<a href="mailto:'.$row['email'].'"><img 
src="mail.gif" /></a>';
             ?>
           
           <p><?php echo $row['insertdate']; ?></p>
           
         <p><?php echo $row['location']; ?></p>
         <p class="w3-border w3-padding"><?php echo nl2br($row['text']); ?></p>
		 </div><br>
        

<?php } ?>
</div>
</div>
<br>

<button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>social</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>
          
												
				
									
						<?php while ($row = $MyDb->f_GetRecord
($resultsocial)) { ?>

        <div class='w3-container w3-card-2 w3-white w3-round w3-margin'>

		<p>para:<?php echo $row['name']; ?><img src="img/<?php echo $row['name']; ?>.jpg" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p>
         <p>de:<?php echo $row['email']; ?><img src="img/<?php echo $row['email']; ?>.jpg" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p>
		          
         
          
             <?php 
                if (strlen($row['web']) > 5) echo '<a href="http://'.$row['web'].'"><img src="img/www.gif" /></a>';
                if (strlen($row['email']) > 5) echo '<a href="mailto:'.$row['email'].'"><img src="img/mail.gif" /></a>';
             ?>
          
           <p><?php echo $row['insertdate']; ?></p>
           
         <p><?php echo $row['location']; ?></p>
         <p class="w3-border w3-padding"><?php echo nl2br($row['text']); ?></p>
		 <br>
        
</div>
<?php } ?>


			
		   </div>
          
	  
	<br> 
<button onclick="myFunction('Demo4')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i 
class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>proyectos</button>
          <div id="Demo4" class="w3-hide w3-container">
            <p><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>
          
												
				
									
						<?php while ($row = $MyDb->f_GetRecord
($resultproyectos)) { ?>

        <div class='w3-container w3-card-2 w3-white w3-round w3-margin'>

		<p>para:<?php echo $row['name']; ?><img src="img/<?php echo $row['name']; ?>.jpg" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p>
         <p>de:<?php echo $row['email']; ?><img src="img/<?php echo $row['email']; ?>.jpg" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p>
		          
        
             <?php 
                if (strlen($row['web']) > 5) echo '<a href="http://'.$row['web'].'"><img src="img/www.gif" /></a>';
                if (strlen($row['email']) > 5) echo '<a href="mailto:'.$row['email'].'"><img src="img/mail.gif" /></a>';
             ?>
           
           <p><?php echo $row['insertdate']; ?></p>
          
         <p><?php echo $row['location']; ?></p>
         <p class="w3-border w3-padding"><?php echo nl2br($row['text']); ?></p><br>
         </div>

<?php } ?>


			
		  
         </div>

	     
        
         
<button onclick="myFunction('Demo5')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i 
class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>laboral</button>
          <div id="Demo5" class="w3-hide w3-container">
            
		<?php while ($row = $MyDb->f_GetRecord($resultlaboral)) { ?>

        <div class='w3-container w3-card-2 w3-white w3-round w3-margin'>

		<p>para:<?php echo $row['name']; ?><img src="img/<?php echo $row['name']; ?>.jpg" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p>
         <p>de:<?php echo $row['email']; ?><img src="img/<?php echo $row['email']; ?>.jpg" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p>
		          
        
             <?php 
                if (strlen($row['web']) > 5) echo '<a href="http://'.$row['web'].'"><img src="img/www.gif" /></a>';
                if (strlen($row['email']) > 5) echo '<a href="mailto:'.$row['email'].'"><img src="img/mail.gif" /></a>';
             ?>
           
           <p><?php echo $row['insertdate']; ?></p>
         
         <p><?php echo $row['location']; ?></p>
         <p class="w3-border w3-padding"><?php echo nl2br($row['text']); ?></p><br>
        
</div>
<?php } ?>

</div></div>


<button onclick="myFunction('Demo6')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i 
class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Enviados</button>
          <div id="Demo6" class="w3-hide w3-container">

												<?php while ($row = $MyDb->f_GetRecord($resultbuzon)) { ?>
       <div class='w3-container w3-card-2 w3-white w3-round w3-margin'>
        

		<p>para:<?php echo $row['name']; ?><img src="img/<?php echo $row['name']; ?>.jpg" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p></p>
         <p>de:<?php echo $row['email']; ?><img src="img/<?php echo $row['email']; ?>.jpg" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p>
		          
         
          
             <?php 
                if (strlen($row['web']) > 5) echo '<a href="http://'.$row['web'].'"><img src="img/www.gif" /></a>';
                if (strlen($row['email']) > 5) echo '<a href="mailto:'.$row['email'].'"><img src="img/mail.gif" /></a>';
             ?>
           
           <p><?php echo $row['insertdate']; ?></p>
           
         <p><?php echo $row['location']; ?><p>
         <p class="w3-border w3-padding"><?php echo nl2br($row['text']); ?></p><br>
        </div>

<?php } ?>




</div>


			
		   

	  
	
        
    
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html> 


