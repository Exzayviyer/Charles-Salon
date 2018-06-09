<?php
include 'database/connect.php';

function addproduct($value)
{
	$conn = connection();

	$sql = "INSERT INTO tbl_product (name, code, image, price)
	VALUES (
	'" . $value['name'] . "',
	'" . $value['code'] . "',
	'product/" . $value['image'] . "',
	'" . $value['price'] . "'
	);";

	if (!mysqli_query($conn, $sql)) {
		echo("Error: " . $sql . "<br>" . mysqli_error($conn));
	}
}

function productlist()
{
	$conn = connection();

	$sql = "SELECT * FROM tbl_product;";

	$result = mysqli_query($conn, $sql);

	$no = 1;
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<th><?php echo $no++; ?></th>
				<th><?php echo $row["name"]; ?></th>
				<th><?php echo $row["code"]; ?></th>
				<th><?php echo $row["price"]; ?></th>
			</tr>
			<?php
		}
	}
	
}