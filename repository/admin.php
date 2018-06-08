<?php
include 'database/connect.php';

function adminlogin($value)
{
	$retVal = 0;

	$conn = connection();

	$sql = "SELECT id, email FROM admin WHERE email = '" . $value['email'] . "' and password = '" . $value['password'] . "';";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);

		session_start();
		$_SESSION["loggedadmin"] = [
			'id' => $row["id"],
			'email' => $row["email"]
		];

		$retVal = $row["id"];
	}

	return $retVal;
}