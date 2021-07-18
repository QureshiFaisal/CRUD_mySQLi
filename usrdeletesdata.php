
<?php
// create connection
$conn = mysqli_connect("localhost", "root","", "test_db");// this statement will return an object which we will save in $conn
// check connection 
if($conn){
    echo "Connected Successfully";
}
//We can write the above code to connect and verify connection. We can write better code as follows

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "test_db";

// create connection 
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

//check connection 
if(!$conn){
    die("Connection Failed");// this statement will exit the code and not execute the code below if connection with db us not established.
}
echo "Connected succesfully ";
 //sql to delete record 
 if(isset($_REQUEST['delete'])){
 $sql = "DELETE FROM student WHERE id = {$_REQUEST['id']}"; // here we store id of the delete record passed from the form below.
 if(mysqli_query($conn, $sql)){
echo "Record Deleted";
 }
 else {
     echo "Error Unable to Delete record";
 }
}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <?php
    $sql = "SELECT * FROM student"; 
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
     echo '<table class="table">';
     echo "<thead>";
     echo "<tr>";
     echo "<th>ID</th>";
     echo "<th>Name</th>";
     echo "<th>Roll</th>";
     echo "<th>Address</th>";
     echo "<th>Action</th>";
     echo '</tr>';
     echo '</thead>';
     
     echo '<tbody>';
     while ($row = mysqli_fetch_assoc($result)){
         echo '<tr>';
         echo'<td>' . $row['id'] . '</td>';
         echo'<td>' . $row['name'] . '</td>';
         echo'<td>' . $row['roll'] . '</td>';
         echo'<td>' . $row['address'] . '</td>';
         echo '<td><form action="" method="POST"><input type="hidden" name="id" value='.$row['id'] .' ><input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete">';
         echo '</tr>';
     } 
    }  else {
        echo "No results";
    }
    ?>
     </tbody>
     </table>
    </div>

 
 


