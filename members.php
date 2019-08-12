<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<?php 
			date_default_timezone_set("America/Chicago");
			$today = date("F d, Y");
		?>	
		<meta name="generator" content="HTML Tidy for Linux/x86 (vers 1st November 2002), see www.w3.org"/>
		<meta http-equiv='refresh' content='5;URL=members.php'/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Member Roster for <?php echo $today?></title>
		<style type="text/css">
			.big{font-size:2em;}
			strong{
				font-size:4em;
				font-weight:bolder;
			}
			div.tinylinks{font-size:1em;}
		</style>
	</head>
	<body>
		<div class="header">
			<strong>Macadamia MUG Main Meeting</strong><br />
		<?php 
		echo "<em class='big'>$today</em>\n</div>";
		$filename = "members.txt";
			if (is_readable($filename)) {
				if (!$handle = fopen($filename, 'r')) {
					echo "Error: Cannot open file $filename";
					exit;
				}
				$num = 1;
				if(file_get_contents($filename)!== ""){
					echo "<table border='1px'><tr><th class='big'>First Name</th><th class='big'>Last Name</th><th class='big'>Email</th></tr>\n";
				}
				else{
					echo "<div class='big'>No one has signed in yet.</div>";
				}
				while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
					$num = count($data);
					$row++;
					echo "<tr>";
					for ($c=0; $c < $num; $c++) {
						echo "<td class='big'>";
						if($c == 2){
							echo "<a href='mailto:".$data[$c]."'>".$data[$c]."</a>";
						}
						else{
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
		<div class="tinylinks big">
			<a href= 'index.php'>&#x2190;Back to sign in</a>
			<?php
			if($num > 1){
				echo " | <a href='erase.php'>Clear List</a>";
				echo " | <a href='print.php'>Print This Page</a>";
			}
			?>
		</div>
	</body>
</html>