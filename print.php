<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php
		date_default_timezone_set("America/Chicago");
		$today = date("F d, Y");
	?>
	<meta name="generator" content="HTML Tidy for Linux/x86 (vers 1st November 2002), see www.w3.org" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Member Roster for <?php echo $today?></title>
	<style type="text/css">
		td, th, em, div{font-size:1.5em;}
		strong{
			font-size:3em;
			font-weight:bolder;
		}
		div.tinylinks{font-size:1em;}
	</style>
</head>
	<body onload="window.print()">
		<div id="header">
		<strong>
			Signed In Members
		</strong><br />
		<?php
		echo "<em>$today</em>
		</div>";
			$filename = "members.txt";
			if (is_readable($filename)) {
				if (!$handle = fopen($filename, 'r')) {
					 echo "Error: Cannot open file $filename";
					 exit;
				}
				$num = 1;
				if(file_get_contents($filename)!== ""){
					echo "<table border='1px'><tr><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
				}
				else{
					echo "<div>No one has signed in yet.</div>";
					//exit;
				}
				while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
					$num = count($data);
					$row++;
					echo "<tr>";
					for ($c=0; $c < $num; $c++) {
						echo "<td>";
						if($c == 2){
							echo "<a href='mailto:".$data[$c]."'>".$data[$c]."</a>";
						}else{
							echo $data[$c];
						}
						echo "</td>";
					}
					echo "</tr>\n";
				}
				fclose($handle);
			}
			?>
		</table>
		<div class="tinylinks">
			<a href= 'members.php'>&#x2190;Back to roster</a>
		</div>
	</body>
</html>
