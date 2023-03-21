<?php include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $conn->select_db($dbname);
    $sql = "UPDATE FROM Post WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Record Updated successfully";
    } else {
        echo "Error Updating record: " . mysqli_error($conn);
    }
    
}