<?php 
include_once 'includes/dbh.inc.php';
//Deleting books
if (isset($_GET['delete'])){
    $bookId = $_GET['delete'];
$sql = "DELETE FROM books WHERE bookId ='$bookId'";
mysqli_query ($conn, $sql);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/mylibrary./style3.css">
</head>
<body>

<div class="container">
<a class="addbook" href="book.php">Add Book</a>
<div id="mainpanel">
<?php
$sql = "SELECT* FROM books;";
$result = mysqli_query ($conn, $sql);
$resultCheck = mysqli_num_rows($result);
//how to represent this in a table. 

echo "<table class='last'> <tr>";
echo "<th class='row'style ='width:30%'> Book Name </th>";
echo "<th class='row'style ='width:15%'> Author</th>";
echo "<th class='row'style ='width:5%'> Edition</th>";
echo "<th class='row'style ='width:10%'> Course </th>";
echo "<th class='row button1'style ='width:15%'> Actions </th>";
echo "<th class='row button1'style ='width:15%'> Actions </th>";
echo "</tr>\n";
if($resultCheck > 0){
    while ($row=mysqli_fetch_assoc($result)){
     
        echo "<tr>";
        echo "<td class='row'>" .$row ['bookName']. "</td>";
        echo "<td class='row'>" .$row ['bookAuthor']. "</td>";
        echo "<td class='row'>" .$row ['bookEdition']. "</td>";
        echo "<td class='row'>" .$row ['bookCourse']. "</td>";
        ?> <td><a class ="edit" href="admin.php?edit=<?php echo $row['bookId']; ?>">Edit</a></td> <?php
       ?> <td><a href="admin.php?delete=<?php echo $row['bookId']; ?>">Delete</a></td> <?php
        echo "</td></tr>\n";
    }
}
?>
</body>
</html>