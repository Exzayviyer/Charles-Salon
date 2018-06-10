<?php
include 'repository/product.php';
include 'shared/admin-header.php';
?>
<body>
	<?php include 'shared/admin-nav.php'; ?>
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">

					<?php include 'shared/sidebar.php'; ?>

				</div><!--/.span3-->

				<div class="span9">
					<div class="content">
						
						<div class="module">
							<div class="module-head">
								<h3>New Product</h3>
							</div>
							<div class="module-body">

								<?php 
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									$product = [
										'name' => $_POST["name"],
										'code' => $_POST["code"],
										'image' => $_POST["file"],
										'price' => $_POST["price"]
									];

									$bool = true;



									if ($bool) {
$allow = array("jpg", "jpeg", "gif", "png");

$todir = 'product/';

if ( !!$_FILES['file']['tmp_name'] ) // is the file uploaded yet?
{
    $info = explode('.', strtolower( $_FILES['file']['name']) ); // whats the extension of the file

    if ( in_array( end($info), $allow) ) // is this file allowed
    {
        if ( move_uploaded_file( $_FILES['file']['tmp_name'], $todir . basename($_FILES['file']['name'] ) ) )
        {
            // the file has been moved correctly
        }
    }
    else
    {
    									?>
										<div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Error!</strong> This file ext is not allowed. 
										</div>
										<?php
        // error this file ext is not allowed
    }
}
										addproduct($product);
										?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Successfully!</strong> Product has been added. 
										</div>
										<?php
									}
								}
								?>

									
									

									<br />

									<form class="form-horizontal row-fluid" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Product</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Type product name here..." name="name" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Code</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Type code here..." name="code" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Image</label>
											<div class="controls">
												<input type="file" id="basicinput" placeholder="Type code here..." name="file" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Price</label>
											<div class="controls">
												<input type="number" id="basicinput" placeholder="Type price name here..." name="price" required>
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn">Add Product</button>
											</div>
										</div>
									</form>
							</div>
						</div>

						<div class="module">
							<div class="module-head">
								<h3>Product</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>No.</th>
											<th>Product</th>
											<th>Code</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody>

										<?php productlist(); ?>

									</tbody>
									<tfoot>
										<tr>
											<th>No.</th>
											<th>Product</th>
											<th>Code</th>
											<th>Price</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div><!--/.module-->

						<br />
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include 'shared/admin-footer.php'; ?>