<!DOCTYPE html>
<html>
<head>
  <title>VIEW DATA</title>  
  <meta name="viewport" content="width=device=width, initial-scale=1.0">   
</head>
<body>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>  
  <form method="post">
  </form>
  <table>
                <tr>
                  <th>ID</th>
                  <th>USERID</th>
                  <th>TITLE</th>
                  <th>BODY</th>
                </tr>
  <?php
    $con = new mysqli('localhost', 'root', '', 'financepeer');
    if(!$con)
    {
      echo 'Please check your connection';
    } 

       $query = "SELECT * FROM userdata";  
       $result = mysqli_query($con, $query);

       while($row = mysqli_fetch_array($result))  
        {
          echo"
                <tr>
                  <td>".$row['id']."</td>
                  <td>".$row['userId']."</td>
                  <td>".$row['title']."</td>
                  <td>".$row['body']."</td>
                </tr>
              ";
            }         
      ?>  
      </table>
</body>
</html>