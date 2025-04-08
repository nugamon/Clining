<?php
include 'connectdb.php';

$id = $_GET['id'];

$mysqli->query("DELETE FROM applicants WHERE id = $id");

header("Location: index.php");
exit();
?>
