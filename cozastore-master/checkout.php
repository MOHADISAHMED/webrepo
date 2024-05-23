
	<?php
	include('component/header.php');
    
	?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Checkout
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
			
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<form method="post" enctype="multipart/form-data">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
						Billing Details
						</h4>
                    <input type="hidden" name="" <?php echo $_SESSION['sessionid']?>>
						<div class="bor8 m-b-20 how-pos4-parent">
                        <input required type="tel" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="username" placeholder="Full Name" value="<?php echo $_SESSION['sessionName']?>">
							<img class="how-pos4 pointer-none" src="images/icons/user.png" width="25px" alt="ICON">
						</div>
				
						<div class="bor8 m-b-20 how-pos4-parent">
                        <input required type="tel" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="useremail" placeholder="Email" value="<?php echo $_SESSION['sessionEmail']?>">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
                        <input required type="tel" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="userphonenumber" placeholder="Phone Number" value="<?php echo $_SESSION['sessionPhonenumber']?>">
							<img class="how-pos4 pointer-none" src="images/icons/phone.png"  width="20px"  alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address" placeholder="Address">
							<img class="how-pos4 pointer-none" src=""  width="0"  alt="ICON">
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="checkout">
							Checkout
						</button>
					</form>
				</div>

				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Your Cart
                    </h4>
                <?php
                    $carttotalfooter = 0;
                    if(isset($_SESSION['cart'])){
                ?>
                    <div class="header-cart-content flex-w">
                        <ul class="header-cart-wrapitem w-full">
                            <?php
                                foreach($_SESSION['cart'] as $cartData){
                                $cartData['pQuantity'] *   $cartData['pPrice']
                            ?>
                            <li class="header-cart-item flex-w flex-t m-b-12">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo $proref.$cartData['pImage']?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="product-detail?pid=<?php echo $cartData['pId']?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        <?php echo $cartData['pName']?>
                                    </a>

                                    <span class="header-cart-item-info">
                                        <?php echo $cartData['pQuantity']?> x Rs. <?php echo $cartData['pPrice']?>
                                    </span>
                                    <span class="header-cart-item-info">
                                        <?php  $carttotalprod = $cartData['pQuantity'] *   $cartData['pPrice'];
                                        echo 'Rs. ' . $carttotalprod ;?>
                                    </span>
                                </div>
                                <div class="p-lr-5 pointer hov-cl1 trans-04 " style="width:20px;">
                                    <a href="?deletecart=<?php echo  $cartData['pId']?>"class="cl2"><i class="zmdi zmdi-close"></i></a>
                                </div>
                            </li>
                            <?php 
                                $carttotalfooter += $carttotalprod;
                                }
                            ?>
                        </ul>
                        
                        <div class="w-full">
                            <div class="header-cart-total w-full p-tb-40">
                                Total: <?php echo 'Rs. ' . $carttotalfooter; ?>
                            </div>
                        </div>
                    </div>
                <?php 
                }
                ?>
                </div>

		</div>
	</section>	
	
	


	<?php
	include('component/footer.php');
	?>