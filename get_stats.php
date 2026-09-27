<?php
include 'connect.php';

$stats = [];

$total = $conn->query("SELECT COUNT(*) as c FROM issues")->fetch_assoc();
$stats['total'] = $total['c'];

$solved = $conn->query("SELECT COUNT(*) as c FROM issues WHERE status='Solved'")->fetch_assoc();
$stats['solved'] = $solved['c'];

$pending = $conn->query("SELECT COUNT(*) as c FROM issues WHERE status='Pending'")->fetch_assoc();
$stats['pending'] = $pending['c'];

$inProgress = $conn->query("SELECT COUNT(*) as c FROM issues WHERE status='In Progress'")->fetch_assoc();
$stats['inProgress'] = $inProgress['c'];

echo json_encode($stats);
?>