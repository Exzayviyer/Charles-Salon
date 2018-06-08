<?php
include 'repository/product.php';
include 'shared/admin-header.php';
?>
<body>
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
										'category' => $_POST["category"],
										'product' => $_POST["product"],
										'stock' => $_POST["stock"],
										'price' => $_POST["price"],
										'description' => $_POST["description"]
									];

									$bool = true;

									if ($bool) {
										addproduct($product);
										?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong> Now you are listening me :) 
										</div>
										<?php
									}
								}
								?>

									
									

									<br />

									<form class="form-horizontal row-fluid" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
										
										<div class="control-group">
											<label class="control-label">Category</label>
											<div class="controls">
												<label class="radio">
													<input type="radio" name="category" id="optionsRadios1" value="Hair" required>
													Hair
												</label> 
												<label class="radio">
													<input type="radio" name="category" id="optionsRadios2" value="Skin" required>
													Skin
												</label> 
												<label class="radio">
													<input type="radio" name="category" id="optionsRadios3" value="Face" required>
													Face
												</label>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Product</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Type product name here..." name="product" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Stock</label>
											<div class="controls">
												<input type="number" id="basicinput" placeholder="Type stock here..." name="stock" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Price</label>
											<div class="controls">
												<input type="number" id="basicinput" placeholder="Type price name here..." name="price" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Description</label>
											<div class="controls">
												<textarea class="span8" rows="5" name="description" required></textarea>
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
											<th>Cetegory</th>
											<th>Product</th>
											<th>Stock</th>
											<th>Description</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody>

										<?php productlist(); ?>

									</tbody>
									<tfoot>
										<tr>
											<th>No.</th>
											<th>Cetegory</th>
											<th>Product</th>
											<th>Stock</th>
											<th>Description</th>
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