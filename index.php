<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Web Sign In</title>
<style type="text/css">
		label{font-size:4em;}
		button{font-size:3em;}
		input.textfield{font-size:4em;}
		span#title{font-size:5em;}
		span#err{
			color:red;
			font-size:3em;
		}
		a#tinylink{
			font-size:2em;
			color:white;
		}
		div#counter{font-size:2em;}
</style>
</head>
<body>
	<form name="signin" action="process.php" id="signin" method="post">
		<table align="center">
			<tr>
				<th colspan="2"><span id='title'>Sign In Here</span><br>
				<?php
					if($_GET["fnerr"] == "1"){
						echo("<span id='err'>Please enter your first name.</span><br>");
					}
					if($_GET["lnerr"] == "1"){
						echo("<span id='err'>Please enter your last name.</span><br>");
					}
					if($_GET["emerr"] == "1"){
						echo("<span id='err'>Please enter a valid email address.</span><br>");
					}
				?></th>
			</tr>
			<tr>
				<td align="right"><label for="firstname">First Name:</label></td>
				<td><input type="text" class="textfield" id="firstname" name="firstname" value="" tabindex="1"></td>
			</tr>
			<tr>
				<td align="right"><label for="lastname">Last Name:</label></td>
				<td><input type="text" class="textfield" id="lastname" name="lastname" value="" tabindex="2"></td>
			</tr>
			<tr>
				<td align="right"><label for="email">Email:</label></td>
				<td><input type="text" class="textfield" id="email" name="email" value="" tabindex="3"></td>
			</tr>
			<tr>
				<td align="center" colspan="3">
					<button type="submit" id="submitbutton" tabindex="4">Sign In</button><br>
					<div id="counter">
						<?php
							$count = count(file("members.txt"));
							switch($count){
								case 0:
									echo "No members are signed in yet.";
									break;
								case 1:
									echo "1 member is signed in.";
									break;
								default:
									echo "There are $count members signed in.";
							}
						?>
					</div><a id="tinylink" href="members.php" name="tinylink">Shhhh...</a>
				</td>
			</tr>
		</table>
	</form>
<script language="javascript" type="text/javascript">
		<!--document.signin.firstname.focus()//-->
</script>
</body>
</html>
