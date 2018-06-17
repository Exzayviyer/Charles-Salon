<?php

include ("database/connect.php");

    //Event

	$product = $_POST['name'];
	$code = $_POST['code'];
	$price = $_POST['price'];

    $image = addslashes($_FILES['image']['tmp_name']);
    $name = addslashes($_FILES['image']['name']);
    $image = file_get_contents($image);
    $image = base64_encode($image);


$sql = "insert into product (name, code, image, price)
        values ('$product', '$code','$image', '$price')";

if (mysqli_query($conn, $sql)) {
    //msg
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

#header("Location: photos.php");

?>