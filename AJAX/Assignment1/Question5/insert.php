<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Title = $_POST['title'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO Movie (Title, Rating)
            VALUES ('$Title', '$rating' )";

    if ($conn->query($sql) === true) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql_select = "SELECT * FROM Movie";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $id = $row['id'];
            $title = $row["Title"];
            $rating = $row["Rating"];

            $return_arr[] = array("id" => $id,
                "Title" => $title,
                "rating" => $rating);
        }
        echo json_encode($return_arr);

    } else {
        echo "0 results";
    }
}
