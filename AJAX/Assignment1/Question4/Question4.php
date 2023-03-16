
<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$upload = true;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $upload = true;
    } else {
        echo "File is not an image.";
        $upload = false;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $upload = false;
}

// Check file size
// if ($_FILES["image"]["size"] > 50000) {
//   echo "Sorry, your file is too large.";
//   $upload = 0;
// }

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $upload = false;
}

// Check if $upload is set to false by an error
if ($upload == false) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo $target_file = $target_dir . basename($_FILES["image"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>