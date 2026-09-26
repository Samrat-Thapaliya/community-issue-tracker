<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['user_name'])){
    echo "You must be logged in to report an issue. <a href='index.php'>Login here</a>";
    exit();
}

if(isset($_POST['title'])){
    $reporter = $_SESSION['user_name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $category = $_POST['category'];

    $photoName = "";
    if(isset($_FILES['photos']) && $_FILES['photos']['name'] != ""){
        $photoName = time() . "_" . $_FILES['photos']['name'];
        move_uploaded_file($_FILES['photos']['tmp_name'], "uploads/" . $photoName);
    }

    $insert = "INSERT INTO issues (reporter_name, title, description, location, category, photo)
               VALUES ('$reporter', '$title', '$description', '$location', '$category', '$photoName')";

    if($conn->query($insert) === TRUE){
        header("location: issue.html");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>