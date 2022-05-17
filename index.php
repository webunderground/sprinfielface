<?php
	require_once('common.php');
	checkUser();
?>
<?php
    
    require_once('db/db_connection.php');
    
    if (isset($_POST['submitBtn'])) {
         $name     = (isset($_POST['name'])) ? htmlentities($_POST['name']) : '' ;
         $comment  = (isset($_POST['comment'])) ? htmlentities($_POST['comment']) : '' ;
         date_default_timezone_set('America/Bogota');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
     $zonahoraria=$actDate;
     
		 $actDate  = date("Y-m-d H:i:s");
         
         //Minimum name and comment length.
         if ((strlen($name) > 2) && (strlen($comment) > 5)){
             $sql = "INSERT INTO muro (name,text,insertdate) VALUES (";
             $sql .= "'".$name."','".$comment."','".$actDate."')";
             $MyDb->f_ExecuteSql($sql);
         }
         
         header("Location: index.php");
    }
    else {

?>

<?php
    
    require_once('db/db_connection.php');
     $user=$_SESSION['userName'];
    $sql = "SELECT * FROM muro ORDER BY insertdate DESC";
    $result = $MyDb->f_ExecuteSql($sql);
    $recordcount = $MyDb->f_GetSelectedRows(); 
    
    
?>

<?php
    
    require_once('db/db_connection.php');
	require_once('general.php');
    $user=$_SESSION['userName'];
    $profile = "SELECT * FROM profile WHERE  name='$user' AND location='profile'  ";
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
  
           
<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>
<!--sildebar-->
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><?php echo $_SESSION['userName']; ?><br></h4>
         <p class="w3-center"><img src="img/<?php echo $_SESSION['userName']; ?>.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
		 <h4 class="w3-center">profiles</h4><br>
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
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> date</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>
			<small>
<?php date_default_timezone_set('America/Bogota');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    setlocale(LC_ALL,"es_ES");
     echo date('d F Y ' );?></p>
	          <p>      <?php echo date('H:i: A')?> </p>
<p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> dia&nbsp;<?php echo date('z');?>,del a&ntilde;o</p>
		</small>
		</p>

          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i></button>
          <div id="Demo2" class="w3-hide w3-container">
            <p><!--aqui-->
          </div>
          
       <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
      
            <p><a href="imag.php"><i class="fa fa-file-image-o" style="font-size:36px"></i></a>.</p>
          
         <div class="w3-row-padding">
<div class="w3-half">
             <img src="img/Nuclear Plant.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img/Blinky.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img/X-ray Bart.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img/Simpson's TV.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img/Duff Beer.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img/Submarine Sandwich.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img/Simpsons.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
		   <div class="w3-half">
             <img src="img/COCA-COLA.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
        
		 

         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card-2 w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">noticias</span>
            <span class="w3-tag w3-small w3-theme-d4">actualidad</span>
            <span class="w3-tag w3-small w3-theme-d3">arte</span>
            <span class="w3-tag w3-small w3-theme-d2">cultura</span>
            <span class="w3-tag w3-small w3-theme-d1">ciencia</span>
            <span class="w3-tag w3-small w3-theme">tecnoligia</span>
            <span class="w3-tag w3-small w3-theme-l1"></span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>fotos!</strong></p>
        <p>
<?php
$archivo="fotos.txt";
$frases=file($archivo);
shuffle($frases);
echo ("<img src=".$frases[0]."></img></p>");
?>
		
		
		</p>
      </div>
     <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>mensaje!</strong></p>
        <p><?php
$archivo="mensaje.txt";
$frases=file($archivo);
shuffle($frases);
echo ("<p>".$frases[0]."</p>");
?>.</p>
      </div>
      
<!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>chat</strong></p>
        
      


<br>
      		<?php
		$abierto=fopen("msg.html","r");
		fpassthru($abierto);
		?>
     </div> 
  <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Muro!</strong></p>
        
      






<br>
        		

        
        
      </div>    
          
      
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="gbook" id="gbook">
              <h6 class="w3-opacity">Social friend muro</h6>
              <p contenteditable="true" class="w3-border w3-padding">
			  <input name="name" type="hidden" size="42" maxlength="15" value="<?php echo $_SESSION['userName']; ?>"/>
             <input name="comment" rows="10" cols="40" class="w3-input w3-border w3-round">
</input></p>
              <button type="submit" type="button" name="submitBtn" class="w3-button w3-theme">Post</button> 
            <?php } ?> 
			</div>
          </div>
        </div>
      </div>
      
      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="img/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">1 min</span>
        <h4>Springfieldface</h4><br>
        <hr class="w3-clear">
        <p>
		
		</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">

  
              </div>
           
        </div>
        
      </div>
     
<div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
      <?php while ($row = $MyDb->f_GetRecord($result)) { ?>
  <div class='w3-container w3-card-2 w3-white w3-round w3-margin'><br>
  <img src="img/<?php echo $row['name']; ?>.jpg"  alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>
  <p><b><?php echo $row['name']; ?></b></p>	  
   <p><?php echo $row['insertdate']; ?></p>
   
    <p class="w3-border w3-padding"><?php echo nl2br($row['text']); ?></p>
  </div>
	<?php } ?>
 
        <br>
       
        <hr class="w3-clear">

        <hr class="w3-clear">
        
         <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom">Like</button> 
         
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom">I don't like</button> 
       <br>
<td><span class="w3-badge w3-red"><?php
echo E_ALL
?></span><i class="fa fa-thumbs-o-up" style="font-size:48px;color:red"></i></td>
<td> <span class="w3-badge w3-red"><?php
echo __LINE__
?></span><i class="fa fa-thumbs-down" style="font-size:48px;color:red"></i></td>
      </div>  

      
	  <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="img/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">music</span>
        <h4>Springfieldface</h4><br>
        <hr class="w3-clear">
        <p>
		<?php
//*****************************************************************************
//
// MICRO CALENDAR  -  Version: 1.0
//
// You may use this code or any modified version of it on your website.
//
// NO WARRANTY
// This code is provided "as is" without warranty of any kind, either
// expressed or implied, including, but not limited to, the implied warranties
// of merchantability and fitness for a particular purpose. You expressly
// acknowledge and agree that use of this code is at your own risk.
//
//*****************************************************************************
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Micro Calendar</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
function showCalendar(){
    // Get key day informations. 
    // We need the first and last day of the month and the actual day
	$today    = getdate();
	$firstDay = getdate(mktime(0,0,0,$today['mon'],1,$today['year']));
	$lastDay  = getdate(mktime(0,0,0,$today['mon']+1,0,$today['year']));
	
	
	// Create a table with the necessary header informations
	echo '<table>';
	echo '  <tr><th colspan="7">'.$today['month']." - ".$today['year']."</th></tr>";
	echo '<tr class="days">';
	echo '  <td>Mo</td><td>Tu</td><td>We</td><td>Th</td>';
	echo '  <td>Fr</td><td>Sa</td><td>Su</td></tr>';
	
	
	// Display the first calendar row with correct positioning
	echo '<tr>';
	if ($firstDay['wday'] == 0) $firstDay['wday'] = 7;
	for($i=1;$i<$firstDay['wday'];$i++){
		echo '<td>&nbsp;</td>';
	}
	$actday = 0;
	for($i=$firstDay['wday'];$i<=7;$i++){
		$actday++;
		if ($actday == $today['mday']) {
			$class = ' class="actday"';
		} else {
			$class = '';
		}
		echo "<td$class>$actday</td>";
	}
	echo '</tr>';
	
	//Get how many complete weeks are in the actual month
	$fullWeeks = floor(($lastDay['mday']-$actday)/7);
	
	for ($i=0;$i<$fullWeeks;$i++){
		echo '<tr>';
		for ($j=0;$j<7;$j++){
			$actday++;
			if ($actday == $today['mday']) {
				$class = ' class="actday"';
			} else {
				$class = '';
			}
			echo "<td$class>$actday</td>";
		}
		echo '</tr>';
	}
	
	//Now display the rest of the month
	if ($actday < $lastDay['mday']){
		echo '<tr>';
		
		for ($i=0; $i<7;$i++){
			$actday++;
			if ($actday == $today['mday']) {
				$class = ' class="actday"';
			} else {
				$class = '';
			}
			
			if ($actday <= $lastDay['mday']){
				echo "<td$class>$actday</td>";
			}
			else {
				echo '<td>&nbsp;</td>';
			}
		}
		
		
		echo '</tr>';
	}
	
	echo '</table>';
}

showCalendar();
?>

</p>
		
		
		
		</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">

  
              </div>
           
        </div>
        
      </div>
     
	   <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="img/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">music</span>
        <h4>Springfieldface</h4><br>
        <hr class="w3-clear">
        <p><?php
$archivo="lista.txt";
$frases=file($archivo);
shuffle($frases);
echo ("<p><audio src=".$frases[0]."controls></audio></p>");?></p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">

  
              </div>
           
        </div>
        
      </div>
     
	
 <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="img/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">videos</span>
        <h4>Springfieldface</h4><br>
        <hr class="w3-clear">
        <p><?php
$archivo="videos.txt";
$frases=file($archivo);
shuffle($frases);
echo ("<p><video id='medio' width='300' height='300' controls><source src=".$frases[0]."> </video>");?></p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">

  
              </div>
           
        </div>
        
      </div>
     
	
	  
	  
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>usuario:</p>
   <i class="fa fa-user-circle" style="font-size:24px"></i> <?php echo $_SESSION['userName']; ?><br>
  <img src="img/<?php echo $_SESSION['userName']; ?>.jpg" class="w3-circle" style="height:25px;width:25px" alt="Avatar"> 
 

            
        
  <a href="logout.php" class="w3-bar-item w3-button" >salir</a><br>
    
 
</div>

<!-- Page Content -->

 <div class="w3-container">
  
     
        </div>
      
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p><span class="w3-tag w3-xlarge w3-padding w3-red" style="transform:rotate(-5deg)">Friend </span></p>
          <br>
           <span class="w3-badge w3-red">
		   <?php
$archivo = "userpwd.txt";
$lineas = count(file($archivo));
echo "$lineas";
?></span><b>usuarios</b>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
           <br>
           <br><br>
            </div>
            <div class="w3-half">
            <br>
           <br><br>
          </div>
           <div class="w3-half">
           <br>
           <br><br>
            </div>
        <div class="w3-half">
           <br>
          <br><br>
            </div>
        </div>
      </div>
      </div>
      <br>
      <br><br>
      <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      
      </div>
     
	 <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Frases!</strong></p>
        <p>
<small>
<p></p>
		</small>
		</p>
      </div>
	  <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>usuarios <?php

$archivo = "userpwd.txt";
$lineas = count(file($archivo));
echo "$lineas";
?>	</strong></p>
              <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        
		
		<p>
		
        
     

	
   <img src="img/homero.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
		
		
		</p><br><br>
      </div><br>
	  
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>bart!</strong></p>
        <p>
		<img src='img/bart.jpg' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>    

<small>
<span class="w3-badge w3-red">
<?php

?></span>

		</small>
		</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>fotos!</strong></p>
        <p>
<small>

		</small>
		</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>fotos!</strong></p>
        <p>
<small>

		</small>
		</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>fotos!</strong></p>
        <p>
<small>

		</small>
		</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>fotos!</strong></p>
        <p>
<small>

		</small>
		</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>fotos!</strong></p>
        <p>
<small>

		</small>
		</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>fotos!</strong></p>
        <p>
<small>

		</small>
		</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>fotos!</strong></p>
        <p>
<small>

		</small>
		</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>fotos!</strong></p>
        <p>
<small>

		</small>
		</p>
      </div>
	  
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>date!</strong></p>
        <p>
<small>
<?php date_default_timezone_set('America/Bogota');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    setlocale(LC_ALL,"es_ES");
     echo date('d F Y ' );?></p>
	          <p><i class='fa fa-clock-o'></i>&nbsp;time:<?php echo date('h:i: A')?> </p>
<p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> hoy es el dia&nbsp;<?php echo date('z');?>,del a&ntilde;o</p>
		</small>
		</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Sistema operativo!</strong></p>
        <p>
<span class="w3-badge w3-red">
<?php
echo PHP_OS
?></span>



		</p>
      </div>
	  
	  
	  <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
     
	  <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
	   <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
	   <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
	   <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
	   <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
	   <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
	   <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
	   <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
	   <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
	   <br>
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p></p>

      </div>
	 <p>
	 


	 </p>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>hecho <a href="https://www.twitter.com/rtuniverso" target="_blank">@rtuniverso</a></h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
 
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
