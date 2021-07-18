
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
$sql = "INSERT INTO student (name, roll, address) VALUES('Bakr', '103', 'Kolkata')";
if(mysqli_query($conn, $sql)){
    echo "New record inserted succesfully";
} else {
    echo "unable to insert data";
}
?>

