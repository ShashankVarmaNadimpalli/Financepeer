<?php
$u_email=$_GET['u_email'];
$u_pass=$_GET['u_pass'];


$con = new mysqli('localhost', 'root', '', 'financepeer');
$query="select * from sample where u_email='".$u_email."'";
$result=mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>AUTHENTICATION</title>
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
</head>
<body>

      <?php
          $row = mysqli_fetch_assoc($result);
			{
			    if($row["u_email"]==$u_email AND $row["u_password"]==$u_pass)
			    {
			       header("location:jsonUpload.php");
			       session_start();  
			       $_SESSION["email"]=$u_email;
			       $_SESSION["pass"]=$u_pass;
			    }
			    else
			    {
			        header("location:index.php?fn=empty");
			        exit();
			    }
			}
	   ?>
    
<script type="text/javascript">
	function home()
	{
		window.location="index.php";
		exit();
		session_close();
	}	   			
</script>

</body>
</html>
