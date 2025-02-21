<?php

$localhost = "localhost";
$root = "root";
$pw = "";
$db = "bookdb";

$conn = new mysqli($localhost,$root,$pw,$db);
if($conn->connect_error){
    die("Connection Failed!").$conn->connect_error;
}
$book = $_POST['book'];
$bookid = $_POST['bookid'];
$issue = $_POST['issue'];

$sql = "INSERT INTO `book_list`(`book`, `bookid`, `issue`) VALUES ('$book','$bookid','$issue')";
$result = $conn->query($sql);

if($result===true ){
    
   header('location:../data/bookmenu.php?msg=Successfully Added!');

}
else{
    echo"error";

}
$conn->close();
?>