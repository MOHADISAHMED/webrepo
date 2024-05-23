
	
	<?php
	include('component/header.php');
	?>


	<!-- Title page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
                <!-- Sidebar Account Menu -->
                <?php
                    include("component/customer-account-menu.php");
                ?>
                <!-- Account Page Content -->
                <div class="col-lg-8 col-xl-8 m-lr-auto m-b-50 ">
                    <div class="wrap-recent-orders bor10 p-lr-20 p-t-20 p-b-20">
                        <h2>Recent Orders</h2> 
                        <div class="wrap-table-my-orders m-t-20">
                            
                            <table class="table-my-orders">
                                <tr class="table_head">
                                    <th class="column-1">Order #</th>
                                    <th class="column-2">Order Date</th>
                                    <th class="column-3">Order Status</th>
                                    <th class="column-4">Total</th>
                                </tr>
                                <?php
                                $query = $pdo->query("SELECT `orders`.*, `invoices`.`totalamount`
                                FROM `orders`
                                    , `invoices`GROUP BY ordertime ='ordertime';");
                                $ordrow = $query ->fetchAll(PDO::FETCH_ASSOC);
                                foreach($ordrow as $values){
                                        ?>
                                <tr class="table_row">
                                    <td class="column-1">
                                        ORD - <?php echo $values['orderid']?>
                                    </td>
                                    <td class="column-2"><?php echo $values['orderdate']?></td>
                                    <td class="column-3"><?php echo $values['orderstatus']?></td>
                                   <td class="column-4">$ <?php echo $values['totalamount']?></td> 
                                </tr>
                                <?php
                                 }
                                ?>
                            </table>
                        </div>
                    </div>
                  
               

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </section>
	
	<?php
	include('component/footer.php');
	?> 