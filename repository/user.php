<?php
include 'database/connect.php';

function register($value)
{
	$conn = connection();

	$sql = "INSERT INTO userinfo (email, password, fname, lname, gender)
	VALUES (
	'" . $value['email'] . "',
	'" . $value['password'] . "',
	'" . $value['fname'] . "',
	'" . $value['lname'] . "',
	'" . $value['gender'] . "'
	);";

	if (!mysql_query($conn, $sql)) {
		echo("Error: " . $sql . "<br>" . mysql_error($conn));
	}
}

function login($value)
{
	$retVal = 0;

	$conn = connection();

	$sql = "SELECT * FROM userinfo WHERE email = '" . $value['email'] . "' and password = '" . $value['password'] . "';";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);

		session_start();
		$_SESSION["user_id"] = $row["user_id"];
		$_SESSION["email"] = $row["email"];
		$_SESSION["fname"] = $row["fname"];
		$_SESSION["lname"] = $row["lname"];
		$_SESSION["gender"] = $row["gender"];

		$retVal = $row["user_id"];
	}

	return $retVal;
}

function checkuser($value)
{
	$retVal = false;

	$conn = connection();

	$sql = "SELECT * FROM userinfo WHERE email = '" . $value['email'] . "';";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		if ($row["email"] == $value['email']) {
			$retVal = true;
		}
	}

	return $retVal;
}

function logout()
{
	session_destroy();
	header("Location: index.php");
}

function getrole($value)
{
	$retVal = "";

	$conn = connection();

	$sql = "SELECT * FROM userinfo WHERE user_id = '" . $value . "';";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);

		$retVal = $row["role"];
	}

	return $retVal;
}