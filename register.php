<?php
	require_once('common.php');

	if (isset($_POST['submitBtn'])){
		// Get user input
		$username  = isset($_POST['username']) ? $_POST['username'] : '';
		$password1 = isset($_POST['password1']) ? $_POST['password1'] : '';
		$password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
        
		// Try to register the user
		$error = registerUser($username,$password1,$password2);
	}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>social proyect</title>
   
<meta name="keywords" content="sprinfielface, red social, bart,lisa, homero">
<meta name="Description" content="la red social de sprinfielface ">

    <link rel="stylesheet" href="w3css/w3.css">
<link rel="stylesheet" href="w3css/w3pro.css">
	</head>
<body>
 <div class="w3-container w3-blue-grey w3-center">
  <h2>Springfieldface</h2>
  <p></p>
</div>
    <div id="main">
<?php if ((!isset($_POST['submitBtn'])) || ($error != '')) {?>
      <div class="caption">Register user</div>
      <div id="icon">&nbsp;</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registerform">
        <table width="100%">
          <tr><td>Username:</td><td> <input class="text" name="username" type="text"  /></td></tr>
          <tr><td>Password:</td><td> <input class="text" name="password1" type="password" /></td></tr>
          <tr><td>Confirm password:</td><td> <input class="text" name="password2" type="password" /></td></tr>
          <tr><td colspan="2" align="center"><input class="w3-button w3-teal" type="submit" name="submitBtn" value="Register" /></td></tr>
        </table>  
      </form>
     
<?php 
}   
    if (isset($_POST['submitBtn'])){

?>
      <div class="caption">Registration result:</div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%"><tr><td><br/>
<?php
	if ($error == '') {
		echo " User: $username was registered successfully!<br/><br/>";
		echo " User: $username por favor <button class='w3-button w3-padding-large' title='Notifications'><i class='fa fa-bell'></i><span class='w3-badge w3-right w3-small w3-green'>admin</span></button> perfil!<br/><br/>";
		echo " User: $username <button class='w3-button w3-padding-large' title='Notifications'><i class='fa fa-bell'></i><span class='w3-badge w3-right w3-small w3-green'>admin</span></button> muro  !<br/><br/>";
		echo ' <a href="login.php">You can login here</a>';
		
	}
	else echo $error;

?>
		<br/><br/><br/></td></tr></table>
	</div>
<?php            
    }
?>
	<div id="source">Micro Login System v 1.0</div>
    </div>
</body>   
