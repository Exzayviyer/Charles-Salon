<?php
include 'database/connect.php';

function addproduct($value)
{
	$conn = connection();

	$sql = "INSERT INTO tbl_product (name, code, image, price)
	VALUES (
	'" . $value['name'] . "',
	'" . $value['code'] . "',
	'" . $value['image'] . "',
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


function purchaseHistory($value)
{
	$sql = "SELECT p.name, p.price ,oi.quantity , o.order_at FROM tbl_order as o join tbl_order_item as oi on o.id = oi.order_id join  tbl_product as p on oi.product_id = p.id Where customer_id = $value;";

	$result = mysqli_query(connection(), $sql);

	$no = 1;
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td class="cell-author hidden-phone hidden-tablet">
					<?php echo $row["name"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["price"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["quantity"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["quantity"] * $row["price"]; ?>
				</td>
				<td class="cell-time align-right">
					<?php echo $row["order_at"]; ?>
				</td>
			</tr>
			<?php
		}
	}
}

function myorder($value)
{
	$sql = "SELECT p.name, p.price ,oi.quantity , o.order_at FROM tbl_order as o join tbl_order_item as oi on o.id = oi.order_id join  tbl_product as p on oi.product_id = p.id Where customer_id = $value and o.order_status = 'PENDING' ;";

	$result = mysqli_query(connection(), $sql);

	$no = 1;
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td class="cell-author hidden-phone hidden-tablet">
					<?php echo $row["name"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["price"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["quantity"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["quantity"] * $row["price"]; ?>
				</td>
				<td class="cell-time align-right">
					<?php echo $row["order_at"]; ?>
				</td>
				<td class="cell-time align-right">
					<?php echo "ONTHEWAY"; ?>
				</td>
			</tr>
			<?php
		}
	}
}

function pendingorder()
{
	#pending
	$sql = "SELECT o.id, ui.fname, ui.lname,  p.name, o.address, o.city , oi.quantity , o.order_at FROM tbl_order as o join tbl_order_item as oi on o.id = oi.order_id join  tbl_product as p on oi.product_id = p.id join userinfo as ui on ui.user_id = o.customer_id Where o.order_status = 'PENDING' order by fname, lname;";

	$result = mysqli_query(connection(), $sql);

	$no = 1;
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td class="cell-author hidden-phone hidden-tablet">
					<?php echo $row["fname"] . ' ' . $row["lname"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["address"]  . ', ' . $row["city"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["name"]; ?>
				</td>
				<td class="cell-time align-right">
					<?php echo $row["quantity"]; ?>
				</td>
				<td class="cell-time align-right">
					<?php echo $row["order_at"]; ?>
				</td>
				<td>
					<button class="btn btn-success" name="del_id" value="<?php echo $row["id"]; ?>">Deliver</button>
					<button class="btn btn-danger" name="rej_id" value="<?php echo $row["id"]; ?>">Reject</button>
				</td>
			</tr>
			<?php
		}
	}

	#delivered & rejected
	$sql = "SELECT o.id, o.order_status, ui.fname, ui.lname,  p.name, o.address, o.city , oi.quantity , o.order_at FROM tbl_order as o join tbl_order_item as oi on o.id = oi.order_id join  tbl_product as p on oi.product_id = p.id join userinfo as ui on ui.user_id = o.customer_id Where o.order_status != 'PENDING' order by fname, lname;";

	$result = mysqli_query(connection(), $sql);

	$no = 1;
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td class="cell-author hidden-phone hidden-tablet">
					<?php echo $row["fname"] . ' ' . $row["lname"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["address"]  . ', ' . $row["city"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["name"]; ?>
				</td>
				<td class="cell-time align-right">
					<?php echo $row["quantity"]; ?>
				</td>
				<td class="cell-time align-right">
					<?php echo $row["order_at"]; ?>
				</td>
				<td>
					<?php echo $row["order_status"]; ?>
				</td>
			</tr>
			<?php
		}
	}
}

function productdelivered($value='')
{
	# code...
	$sql = "UPDATE tbl_order SET order_status = 'DELIVERED' WHERE id = $value;";

	if (!mysqli_query(connection(), $sql)) {
		echo("Error: " . $sql . "<br>" . mysqli_error(connection()));
	}
}

function productrejected($value='')
{
	# code...
	$sql = "UPDATE tbl_order SET order_status = 'REJECTED' WHERE id = $value;";

	if (!mysqli_query(connection(), $sql)) {
		echo("Error: " . $sql . "<br>" . mysqli_error(connection()));
	}
}