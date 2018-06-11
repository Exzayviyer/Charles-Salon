<?php
$conn = mysqli_connect("localhost", "root", "", "salon");

if (isset($_POST['viewid'])) {
	$sql = "SELECT * FROM inbox WHERE id = " . $_POST['viewid'];

	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}

if (isset($_GET['delid'])) {
	$sql = "DELETE FROM inbox WHERE id = " . $_GET['delid'];

	mysql_query($conn, $sql);
	
	header("Location: inbox.php");
}