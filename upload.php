<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "financepeer";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>


<?php
$target_dir = "C:/xamp/htdocs/finance/upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;


if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    PARSEDATA($target_file,$conn);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


function PARSEDATA($target_file,$conn)
{
	$json = file_get_contents($target_file);
	$json_data = json_decode($json,true);
  	foreach ($json_data as $a) {
  		 $id = $a["id"];
  		 $user_id = $a["userId"];
  		 $title = $a["title"];
  		 $body = $a["body"];
		$sql = 'INSERT INTO userData VALUES ( "'.$id.'", "'.$user_id.'", "'.$title.'","'.$body.'")';
		if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	}

echo "File datas inserted successfully to mysql DB";
echo '<br><a href="/viewData.php">View Data</a>';
}

?>