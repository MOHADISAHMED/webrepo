<?php
<<<<<<< HEAD
include("component/header.php");
?>
 <!-- Blank Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded pt-4 mx-0">
                    <div class="col-md">
                    
            <!-- Blank End -->
                            <div class="table-responsive">
                            <div class="row mb-4">
                <div class="col-md-6 d-flex">
                    <h6 class="align-content-center m-0">All Products</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="addproduct.php" class="btn btn-success">Add New</a>
                </div>
            </div>
                                <table class="table">
                                    <thead> 
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Image</th>
                                            <th scope="col" class="px-5" colspan="2">Action</th>
                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $pdo->query("SELECT `products`.*, `categories`.`catname`
                                        FROM `products` 
                                            INNER JOIN `categories` ON `products`.`productcatid` = `categories`.`catid`;");
                                        $prorow = $query ->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($prorow as $values){
                                                ?>
                                      <tr>
                                            <td scope="row"><?php echo $values['productid']?></td>
                                            <td><?php echo $values['productname']?></td>
                                            <td><?php echo $values['productprice']?></td>
                                            <td><?php echo $values['productdescription']?></td>
                                            <td><?php echo $values['catname']?></td>
                                            <td><?php echo $values['productquantity']?></td>
                                            <td><img src="<?php echo $proref.$values['productimage']?>" alt="" width="80px"></td>
                                            <td><a href="updateproduct.php?pid=<?php echo $values['productid'] ?>" class="btn btn-success">Edit</a></td>
                                            <td><a href="?prodeleteKey=<?php echo $values['productid'] ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                                <?php

                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            </div>
                </div>
            </div>   
<?php
include("component/footer.php");
=======
   include("component/header.php");
?>

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded  mx-0">
                    <div class="col-md-12 ">
                    <h6 class="mb-4">All Products</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">category</th>
                                        <th scope="col">Image</th>
                                        <th scap = "col" class= "px-5" colspan="2">Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $querry = $pdo ->query("SELECT `product`.*, `categories`.`CatName`
                                    FROM `product` 
                                        LEFT JOIN `categories` ON `product`.`productCatid` = `categories`.`Catid`;");
                                    $proRow = $querry->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($proRow as $values){
                                        ?>
                                        <tr>
                                        <td><?php echo $values ['productid']?></td>
                                        <td><?php echo $values ['productName']?></td>
                                        <td><?php echo $values ['productPrice']?></td>
                                        <td><?php echo $values ['productQuantity']?></td>
                                        <td><?php echo $values ['productDescription']?></td>
                                        <td><?php echo $values ['CatName']?></td>
                                        <td><img src=<?php echo $proRef.$values['productImage']?> alt="" width="88"> </td>                                                                         
                                      <td><a href="updateproducts.php?pid=<?php echo $values ['productid']?>" class="btn btn-success">Edit</a></td>
                                      <td><a href= "?pdeleteKey=<?php echo $values['productid']?>" class ="btn btn-danger">Delete</a></td>  
                                    </tr>
                                                                     
                                        <?php
                                     }      
                                     ?>                              
                             
                     
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php
   include("component/footer.php");
>>>>>>> 700f3cd9ea2bb8a3c086ee8c7ad0b8654a6b338e
?>