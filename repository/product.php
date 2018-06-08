<?php
include 'database/connect.php';

function addproduct($value)
{
	$conn = connection();

	$sql = "INSERT INTO product (category, pname, pstock, price, pdescription)
	VALUES (
	'" . $value['category'] . "',
	'" . $value['product'] . "',
	'" . $value['stock'] . "',
	'" . $value['price'] . "',
	'" . $value['description'] . "'
	);";

	if (!mysql_query($conn, $sql)) {
		echo("Error: " . $sql . "<br>" . mysql_error($conn));
	}
}

function productlist()
{
	$conn = connection();

	$sql = "SELECT * FROM product;";

	$result = mysqli_query($conn, $sql);

	$no = 1;
	while (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		?>
		<th><?php echo $no++; ?></th>
		<th><?php echo $row["category"]; ?></th>
		<th><?php echo $row["pname"]; ?></th>
		<th><?php echo $row["stock"]; ?></th>
		<th><?php echo $row["price"]; ?></th>
		<th><?php echo $row["pdescription"]; ?></th>
		<?php
	}
}