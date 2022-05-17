<?php 
	if (isset($_GET['msg'])){
		if (file_exists('msg.html')) {
		   $f = fopen('msg.html',"a+");
		} else {
		   $f = fopen('msg.html',"w+");
		}
      $nick = isset($_GET['nick']) ? $_GET['nick'] : "Hidden";
      $msg  = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : ".";
      $line = "<p><span class=\"w3-card-4 w3-dark-grey\"><b>$nick: </b>$msg</span></p>";
		fwrite($f,$line."\r\n");
		fclose($f);
		
		echo $line;
		
	} else if (isset($_GET['all'])) {
	   $flag = file('msg.html');
	   $content = "";
	   foreach ($flag as $value) {
	   	$content .= $value;
	   }
	   echo $content;

	}
?>	
