<?php
include 'database/connect.php';

function message($value)
{
	$conn = connection();

	$sql = "INSERT INTO inbox (name, subject, body, ddate)
	VALUES (
	'" . $value['name'] . "',
	'" . $value['subject'] . "',
	'" . $value['body'] . "',
	'" . $value['date'] . "'
	);";

	if (!mysqli_query(, $sql)) {
		echo("Error: " . $sql . "<br>" . mysqli_error($conn));
	}
}

function msglist()
{
	$sql = "SELECT * FROM inbox;";

	$result = mysqli_query(connection(), $sql);

	$no = 1;
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td>
					<a href='javascript: view(<?php echo $row['id']; ?>)' class='btn btn-info'>Read</a>
					<a href="javascript: delete(<?php echo $row['id']; ?>)" class="btn btn-danger">Delete</a>
					<a data-toggle="modal" href="#viewmsg" class="btn btn-danger">dd</a>
				</td>
				<td class="cell-author hidden-phone hidden-tablet">
					<?php echo $row["name"]; ?>
				</td>
				<td class="cell-title">
					<?php echo $row["subject"]; ?>
				</td>
				<td class="cell-time align-right">
					<?php echo $row["date"]; ?>
				</td>
			</tr>
			<?php
		}
	}
}