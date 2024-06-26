
	
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

                                <tr class="table_row">
                                    <td class="column-1">
                                        ORD - 21453
                                    </td>
                                    <td class="column-2">13-05-2024</td>
                                    <td class="column-3">Out Of Factory</td>
                                    <td class="column-4">$ 36.00</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <!-- <div class="box bor10 account-details-wrapper m-t-40 p-lr-20 p-t-20 p-b-20">
                        <h2>My account</h2>
                        
                        <p class="lead m-t-10">Change your personal details or your password here.</p>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">Old password <span class="required">*</span></label>
                                        <input type="password" class="form-control" id="password_old" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">New password <span class="required">*</span></label>
                                        <input type="password" class="form-control" id="password_1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password <span class="required">*</span></label>
                                        <input type="password" class="form-control" id="password_2">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>

                    </div> -->
                    <div class="box bor10 account-details-wrapper m-t-40 p-lr-20 p-t-20 p-b-20">
                        <h3>Personal details</h3>
                        <form method="post">
                            <input type="text" hidden value="<?php echo $_SESSION['sessionid']?>" name="userid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username">UserName</label>
                                        <input type="text" class="form-control" id="username" value="<?php echo $_SESSION['sessionName']?>" name="username">
                                    </div>
                                </div>
                                
                            </div>

                            <!-- <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" id="company">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="street">Street</label>
                                        <input type="text" class="form-control" id="street">
                                    </div>
                                </div>
                            </div> -->

                            <div class="row">
                               

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="text" class="form-control" id="phone" value="<?php echo $_SESSION['sessionPhonenumber']?>" name="userphonenumber">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" value="<?php echo $_SESSION['sessionEmail']?>" name="useremail">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary" name="updatedetails"><i class="fa fa-save"></i> Save changes</button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box bor10 password-details-wrapper m-t-40 p-lr-20 p-t-20 p-b-20 ">
                        <h3>Password Update</h3>
                        <form method="post">
                            <div class="row m-t-20">
                                <div class="col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="password_old">Old Password <span class="required">*</span></label>
                                        <input required type="password" class="form-control" name="oldPass" id="password_old" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="password_1">New Password <span class="required">*</span></label>
                                        <input required type="password" class="form-control" name="newPass" id="password_1">
                                    </div>
                                </div>
                               
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" name="updatePassword" class="btn btn-primary"><i class="fa fa-save"></i> Update New Password</button>
                            </div>
                        </form>

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