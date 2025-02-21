<?php
session_start();
$localhost = "localhost";
$root = "root";
$pw = "";
$db = "bookdb";

$conn = new mysqli($localhost,$root,$pw,$db);
if($conn->connect_error){
    die("Connection Failed!").$conn->connect_error;
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link href="../src/output.css" rel="stylesheet">

</head>
<body class="bg-dark h-screen font-bold mx-auto">


<div class="container text-lg pt-10">

<!-- Menu -->
<div class="">

<a href="#" class="no-underline text-white hover:border-b hover:border-orange-700">Home</a>
<a href="#" class="no-underline text-white ml-3 hover:border-b hover:border-orange-700">Book</a><br>
<!-- Searchbar -->
<form action="../data/search1.php" method="GET">
        <div class="d-flex mb-3 position-absolute end-0 mr-36 h-7">
        <input type="text" name="search" placeholder="search..." class="form-control">
        <button type="submit" class="btn btn-primary p-1 "><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>


<!-- Button trigger modal -->
<button type="button" class="bg-blue-500 hover:bg-blue-900 p-1 mt-5 mb-3 text-white rounded-lg border-red-600" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-solid fa-plus"></i>Add New
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Book List</h1>
<form action="../data/book.php" method="POST">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<label>Book Name</label><br>
<input type="text" class="form-control" placeholder="Book Name" name="book"><br>

<label>Book Id</label><br>
<input type="number" class="form-control" placeholder="Book Id" name="bookid"><br>

<label for="#book">Status of Book</label><br>
<select id="book" class="form-control" name="issue">
<option value="Available">Available</option>
<option value="Not Available">Not Available</option>
</select><br>

</div>
<div class="modal-footer">
<input type="submit" name="submit" value="Add" class="btn btn-success">
</div>
</form>
</div>
</div>
</div>
<?php
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?><br>
<div class="container flex items-center mt-4">
  
<table class="table table-striped table-dark table-hover table-bordered  text-white ">
<thead>
<tr>
<th>Book Name</th>
<th>Book ID</th>
<th>Status of Book</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$sql = "SELECT * FROM `book_list`";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

?>
<tr>
<th><?php  echo $row['book']; ?></th>
<th><?php  echo $row['bookid']; ?></th>
<th><?php echo $row['issue']; ?></th>
<th class="flex">
<a href="../data/update.php?id=<?php echo $row['id'];?>" class="bg-green-700 hover:bg-green-950 text-decoration-none mr-2 text-white  p-2 rounded-3"><i class="fa-solid fa-pen-to-square"></i></a>

<!-- Button trigger modal delete -->
<a href="#" type="button" class="bg-red-700 hover:bg-red-950 rounded-3 p-1 text-white" data-bs-toggle="modal" data-bs-target="#delete-<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></a>

<!-- Modal -->
<div class="modal fade" id="delete-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
<div class="modal-dialog ">
<div class="modal-content">
<div class="modal-body bg-danger p-8 text-center">
<button type="button" class="btn-close btn-close-white absolute end-0 mr-3 hover:bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
<p>Are You Sure You Want to Delete?</p>
<form action="../data/delete.php" method="POST">   
<button type="submit" class="bg-indigo-600 hover:bg-red-950 rounded-3 p-1 w-48 h-[45px]" name="delete">Delete</button>
<input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
</form>
</div>
</div>
</div>
</div>

</th>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<script src="../js/bootstrap.bundle.js"></script>
<script>
</script>

</body>
</html>
