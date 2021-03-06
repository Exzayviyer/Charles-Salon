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


									
									

									<br />

									<form class="form-horizontal row-fluid" method="post" action="AddProduct.php"  enctype="multipart/form-data">
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Product</label>
											<div class="controls">
												<input type="text" id="name" placeholder="Type product name here..." name="name" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Code</label>
											<div class="controls">
												<input type="text" id="code" placeholder="Type code here..." name="code" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Image</label>
											<div class="controls">
												<input type="file" name="image" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Price</label>
											<div class="controls">
												<input type="number" id="price" placeholder="Type price name here..." name="price" required>
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