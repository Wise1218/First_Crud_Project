<?php
$localhost = "localhost";
$root = "root";
$pw = "";
$db = "bookdb";

$conn = new mysqli($localhost,$root,$pw,$db);
if($conn->connect_error){
    die("Connection Failed!").$conn->connect_error;
}
if(isset($_POST['delete']));
$id = $_POST['ID'];

$sql = "DELETE FROM `book_list` WHERE id='$id'";
$conn->query($sql);

 header("location:../data/bookmenu.php?msg=Successfully Deleted");
$conn->close();
?>