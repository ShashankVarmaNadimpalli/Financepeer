<!DOCTYPE html>
<html>
<head>
<title>HOME</title>
<meta name="viewport" content="width=device=width, initial-scale=1.0">	
</head>
<body>
	<form method="get" action="auth.php">
		<h3>FINANCEPEER</h3>
		<input type="text" name="u_email">EMAIL</input>
		<br>
		<input type="text" name="u_pass">PASSWORD</input>
		<br>
		<button name="submit">SUBMIT</button>
	</form>
<?php
if(isset($_GET['fn']))
{
	if($_GET['fn']=="empty")
	{
		echo("<h4>*Invalid details!</h4>");
	}			
}
?>	
</body>
</html>
