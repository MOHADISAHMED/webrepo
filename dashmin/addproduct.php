<?php
include ("component/header.php");
?>
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded mx-0">
                    <div class="col-md-12 ">
                       <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Product</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="Product Name" class="form-label">Product Name</label>
                                    <input type="text" name="pName" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
<<<<<<< HEAD
                                <label for="Product Catgory"  class="form-label">Product Category</label>
                                <div class="form mb-3">
                                 
                                <select class="form-select" name="pCatid" id=""
                                    aria-label="">
                                    <option selected hidden>Select Anyone</option>
                                    <?php
                                    $query = $pdo->query("SELECT * from categories");
                                    $row = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $values) {
                                        ?>
                                        
                                        <option value="<?php echo $values['catid'] ?>"><?php echo $values['catname'] ?></option>

                                            <?php
                                        }
                                        ?>   
                                   </select>
                            </div>
                                <div class="mb-3">
                                <label for="floatingtextarea" >Product Description</label>
                                <textarea class="form-control"
                                    id="emailHelp" name="pDescription" style="height: 150px;"></textarea>
=======
                                <div class="mb-3">
                                    <label for="Product Category" class="form-label">Product Category</label>
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name='pCatid'>
                                        <option selected hidden>select Anyone</option>
                                        <?php
                                        $querry = $pdo->query("SELECT * From categories");
                                        $row=$querry->FETCHALL(PDO::FETCH_ASSOC);
                                        foreach($row as $values) {
                                        ?>
                                           <option value = "<?php echo $values['Catid']?>"> <?php echo $values ['CatName']?> </option>
                                           <?php
                                        }
                                        ?>

                                    </select>
                                </div>


                                <div class="mb-3">
                                <label for="floatingtextarea">Product Description</label>
                                <textarea class="form-control" name="pDescription"
                                    id="emailHelp" style="height: 150px;"></textarea>
>>>>>>> 700f3cd9ea2bb8a3c086ee8c7ad0b8654a6b338e
                        
                                </div>
                               <div class="mb-3">
                                    <label for="Product Quantity" class="form-label">Product Quantity</label>
                                    <input type="number" name="pQuantity" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
<<<<<<< HEAD
=======

                                  
                                </div>
                           
>>>>>>> 700f3cd9ea2bb8a3c086ee8c7ad0b8654a6b338e
                                    </div>
                                    <div class="mb-3">
                                    <label for="Product price" class="form-label">Product Price</label>
                                    <input type="number" name="pPrice" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
                                </di>
                                <div class="mb-3">
                                    <label for="Product Img" class="form-label">Image</label>
<<<<<<< HEAD
                                    <input type="file" name="pImage" class="form-control" >
=======
                                    <input type="file" name="pImage" class="form-control" id="exampleInputPassword1">
>>>>>>> 700f3cd9ea2bb8a3c086ee8c7ad0b8654a6b338e
                                </div>
                                <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
<<<<<<< HEAD
                                <button type="submit" name="addproduct" class="btn btn-primary">Add Product</button>
=======
                                <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
>>>>>>> 700f3cd9ea2bb8a3c086ee8c7ad0b8654a6b338e
                            </form>
</div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php
include ("component/footer.php");
?>