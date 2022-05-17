<?php
require_once('common.php');

$error = '0';

if (isset($_POST['submitBtn'])){
	// Get user input
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
        
	// Try to login the user
	$error = loginUser($username,$password);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Springfieldface </title>
  
<link rel="stylesheet" href="w3css/w3.css">
<link rel="stylesheet" href="w3css/w3pro.css">

</head>
<body>
    <div class="w3-container w3-blue-grey w3-center">
  <h2>Springfieldface</h2>
  <p></p>
</div>

<?php if ($error != '') {?>
      <div class="caption">Site login</div>
      <div id="icon">&nbsp;</div>
      <div class="w3-container w3-padding w3-center">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
<table>
     <td>     Username: <input class="text" name="username" type="text"class="w3-input w3-border w3-round" rows="10" cols="40" /></p></td></tr>
      <td>    Password: <input class="text" name="password" type="password" /></td></tr>
          <tr><td colspan="2" align="center"><input class="w3-button w3-teal" type="submit" name="submitBtn" value="Login" class="w3-red"/></td></tr>
         </table>
      </form>
      
      &nbsp;<a href="register.php">Register</a>
      
<?php 
}   
    if (isset($_POST['submitBtn'])){

?>
      <div class="caption">Login result:</div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%"><tr><td><br/>
<?php
	if ($error == '') {
		echo "Welcome $username! <br/>You are logged in!<br/><br/>";
		echo '<a href="index.php">Now you can visit the index page!</a>';
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
