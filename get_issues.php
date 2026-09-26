<?php
include 'connect.php';
$result = $conn->query("SELECT * FROM issues ORDER BY reported_at DESC");
$issues = [];
while($row = $result->fetch_assoc()){
    $issues[] = $row;
}
echo json_encode($issues);
?>