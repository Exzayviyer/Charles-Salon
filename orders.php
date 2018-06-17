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
						
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            # code...
                            if (isset($_POST['del_id'])) {
                                # code...
                                productdelivered($_POST['del_id']);
                            }
                            if (isset($_POST['rej_id'])) {
                                # code...
                                productrejected($_POST['rej_id']);
                            }
                        }
                        ?>

						<div class="module">
							<div class="module-head">
								<h3>Pending Orders</h3>
							</div>
                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            <tr class="heading">
                                                <td class="cell-author hidden-phone hidden-tablet">
                                                    Customer Name:
                                                </td>
                                                <td class="cell-title">
                                                    Address
                                                </td>
                                                <td class="cell-title">
                                                    Product
                                                </td>
                                                <td class="cell-time align-right">
                                                    Quantity
                                                </td>
                                                <td class="cell-time align-right">
                                                    Order Date
                                                </td>
                                                <td>
                                                    Action / Status
                                                </td>
                                            </tr>

                                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                                            <?php pendingorder(); ?>
                                            
                                            </form>

                                        </tbo.dy>
                                    </table>
                                </div>
                                <div class="module-foot">
                                </div>
                            </div>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
    
<!--modal view msg-->
<script type="text/javascript">
    function view(id) {
        var viewid = id;
        $.ajax({
            url: "if.php",
            method: "post",
            data: {viewid: viewid},
            dataType: "jason",
            success: function(data) {
                $('#date').text(data.date);
                $('#subject').text(data.date);
                $('#msg').text(data.body);
                $('#viewmsg').modal('show');
            }
        });
    }
</script>
<div class="modal fade" id="viewmsg" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <input type="buttom" class="close" data-dismiss="modal" value="&times;">
                    <label class="control-label">Date: </label>
                    <label id="date"></label><br><br>
                    <label class="control-label">Subject: </label>
                    <label id="subject"></label><br><br>
                    <label id="msg"></label><br>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function delete(id) {
        var delid = id;
        $.ajax({
            url: "if.php",
            method: "post",
            data: {delid: delid},
            dataType: "json",
            success: function(){
                window.location.href = "inbox.php";
            }
        });
    }
</script>
<!--/modal view msg-->

<?php include 'shared/admin-footer.php'; ?>