<!DOCTYPE html>
<html>
	<head>
		<title>WEB-BASED GPIO CONTROL</title>
	</head>
	
	<!-- CSS -->
	<style type="text/css">
	html,
		body {
			height: 100%;
			background-image: url(bkgnd.jpg);
			background-size: 100%;
			background-repeat: no-repeat;
		}
		
		fieldset {
			border: 2px solid #000000;
			width: 200px;
		}
		
		output {
			background-color: #D7DFE9;
			border: 10px solid #D7DFE9;
		}
	</style>
	
	<!-- HTML -->
	<body>
		<center>
			<h1> Turn an LED ON/OFF </h1>
			<h3> (+) @ GPIO pin 6 (P1[31]/JB1[22]) | (-) @ GND (P1[9]/JB1[5]) </h3>
			
			<form action="/index.php" target="_self" method="post">
				<fieldset>
					<input type="radio" name="led" value="ON"/>ON
					<input type="radio" name="led" value="OFF"/>OFF<br><br>
					<input type="submit" name="submit" value="ACTION!"/>
				</fieldset>
					<br><output type="text" name="status"/>LED Status: 	
			</form>
			
			<!-- PHP -->
			<?php
			if (isset($_POST['submit'])) {
				if ($_POST['led'] == 'ON') {
					echo `gpio mode 22 out`;
					echo `gpio write 22 1`;
					//echo `sh write_1`;
					echo "The LED is ON!";
				}
			
				elseif ($_POST['led'] == 'OFF') {
					echo `gpio mode 22 out`;
					echo `gpio write 22 0`;
					//echo `sh write_0`;
					echo "The LED is OFF!"; 
				}
			}
			?>
					
		</center>
	</body>
</html>
