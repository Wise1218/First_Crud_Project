<?php 

$host="localhost";
$user="root";
$pass="";
$db="bookdb";

$conn = new mysqli($host,$user,$pass,$db);
if(isset($_GET['id'])){
$id = $_GET['id'];



$sql = "SELECT * FROM `book_list` where `id`=$id";  
$booklist = $conn->query($sql);


if(!$booklist){
die("query failed!".$conn->connect_error);
}
else{
$row = $booklist ->fetch_assoc();


}
mysqli_close($conn);
}
?>

<?php

$host="localhost";
$user="root";
$pass="";
$db="bookdb";

$conn = new mysqli($host,$user,$pass,$db);

if(isset($_POST['update'])){
if(isset($_GET['id_new'])){
$idnew=$_GET['id_new'];
}

$book = $_POST['book'];
$bookid = $_POST['bookid'];
$issue = $_POST['issue'];

$sql ="UPDATE `book_list` SET `book`='$book',`bookid`='$bookid',`issue`='$issue' WHERE id='$idnew'";
$booklist = $conn->query($sql);
if(!$booklist){
die("query failed!".$conn->connect_error);
}
else{

header('location:../data/bookmenu.php?msg=Successfully Update');

}
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="..//src/output.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<title>UPDATE</title>
</head>
<body>

<!-- Form Update -->
<div class="container-fluid bg-dark h-screen pt-20 ">
<a href="../data/bookmenu.php" class="text-white bg-blue-500 hover:bg-blue-800 p-2 rounded-3 absolute top-0 mt-7 ml-7"><i class="fa-solid fa-backward"></i> Back</a>
<div class="flex justify-content-center items-center shadow  pt-20 bg-transparent rounded-3xl w-[50%] mx-auto">

<form action="../data/update.php?id_new=<?php echo $id;?>" method="POST">
<img src="../th.jpg" alt="logo" class="w-24 bg-transparent rounded-full mx-auto">


<label>Book Name</label><br>
<input type="text" class="form-control" placeholder="Book Name" name="book" value="<?php echo $row['book']; ?>"  required><br>

<label>Book Id</label><br>
<input type="number" class="form-control" placeholder="Book Id" name="bookid" value="<?php echo $row['bookid']; ?>"  required><br>

<label for="#book">Status of Book</label><br>
<select id="book" class="form-control" name="issue" required>
<option value="Available" <?php echo ($row['issue'] == "Available") ? 'selected' : ''; ?>>Available</option>
<option value="Not Available" <?php echo ($row['issue'] == "Not Available") ? 'selected' : ''; ?>>Not Available</option>
</select><br>
<input type="submit" name="update" value="Update" class="bg-blue-500 text-white p-2 rounded-3xl hover:bg-blue-800 mb-7 w-60">


</div>
</div>

</div>
</body>
</html>