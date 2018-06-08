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
								<h3>New Category</h3>
							</div>
							<div class="module-body">

									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Oh snap!</strong> Whats wrong with you? 
									</div>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Well done!</strong> Now you are listening me :) 
									</div>

									<br />

									<form class="form-horizontal row-fluid">
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Category</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Type category name here...">
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn">Add Category</button>
											</div>
										</div>
									</form>
							</div>
						</div>

						<div class="module">
							<div class="module-head">
								<h3>Category</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>No.</th>
											<th>Cetegory</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>hair</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th>No.</th>
											<th>Cetegory</th>
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