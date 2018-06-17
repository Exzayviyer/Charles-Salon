<?php 
  include 'shared/header.php';
  include 'repository/product.php';
?>

  <body id="page-top" style="background-color: gray;">

    <!-- Navigation -->
    <?php include 'shared/nav.php'; ?>

<br>
<br>
<br>
<br>
      <br>
  <div class="wrapper">
    <div class="container">
      <div class="row">
          <div class="content">
            
            <div class="module">
              <div class="module-head">
              </div>
                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            <tr class="heading">
                                                <!--<td>
                                                    Action
                                                </td>
                                            -->
                                                <td class="cell-author hidden-phone hidden-tablet">
                                                    Product
                                                </td>
                                                <td class="cell-title">
                                                    Price
                                                </td>
                                                <td class="cell-title">
                                                    Quantity
                                                </td>
                                                <td class="cell-title">
                                                    Payment
                                                </td>
                                                <td class="cell-time align-right">
                                                    Date
                                                </td>
                                                <td class="cell-time align-right">
                                                   Status
                                                </td>
                                            </tr>


                                   <?php myorder($_SESSION["user_id"]); ?>
                                            
                                            
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

    <?php include 'shared/footer.php'; ?>