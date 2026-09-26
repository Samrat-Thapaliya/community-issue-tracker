<?php
include 'connect.php';

if(isset($_POST['id']) && isset($_POST['status'])){
    $id = intval($_POST['id']);
    $status = $_POST['status'];
    $conn->query("UPDATE issues SET status='$status' WHERE id=$id");
}
?>