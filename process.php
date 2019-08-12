<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Macadamia MUG - Web Sign In</title>
		<style type="text/css">
			div{font-size:4em;}
			div.err{color:red;}
		</style>
	</head>
	<body>
		<?php
		$errstring = "";
		if(preg_match("/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i",trim($_POST["email"])) == 0){
			$errstring .= "emerr=1&";
			}
		if($_POST["firstname"] == ""){
			$errstring .= "fnerr=1&";
		}
		if($_POST["lastname"] == ""){
			$errstring .= "lnerr=1";
		}
		if($errstring !== "")
		{
			echo "<META HTTP-EQUIV='refresh' content='0;URL=index.php?".$errstring."'>";	
		}
		else{
			$firstname = ucfirst(strtolower(trim(str_replace(",","",$_POST["firstname"]))));
			$lastname = ucfirst(strtolower(trim(str_replace(",","",$_POST["lastname"]))));
			$email = strtolower(trim(str_replace(",","",$_POST["email"])));
  
			$patterns = array("/(?<=-)([a-z])/e","/(?<=Mac)([a-z])/e","/(?<=Mc)([a-z])/e","/(?<=O')([a-z])/e",);
			$lastname = preg_replace($patterns,"strtoupper('$0')",$lastname);
			
			$data = "$firstname,$lastname,$email\n";

			$filename = 'members.txt';
			if (is_writable($filename)) {
				if (!$handle = fopen($filename, 'a')) {
					 echo "<div class='err'>Error: Cannot open file $filename.</div>";
					 exit;
				}
				if (fwrite($handle, $data) === FALSE) {
					echo "<div class='err'>Error: Cannot write to file $filename.</div>";
					exit;
				}
				fclose($handle);
			
				echo "<div>Hello, $firstname, and thank you for signing in!<p>Now sending you back to the login page.</div>";
				echo "<META HTTP-EQUIV='refresh' content='3;URL=index.php'>";

			} else {
				echo "<div class='err'>Error: The file $filename is not writable.</div>";   
			}
		}
		?>
	</body>
</html>
