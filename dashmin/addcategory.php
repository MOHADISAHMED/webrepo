<?php
<<<<<<< HEAD
include ("component/header.php");
?>
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded mx-0">
                    <div class="col-md-12 ">
                       <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Form</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" name="cName" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Image</label>
                                    <input type="file" name="cImage" class="form-control" id="exampleInputPassword1">
                                </div>
                                <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
                                <button type="submit" name="addcategory" class="btn btn-primary">Add Category</button>
                            </form>
</div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php
include ("component/footer.php");
?>
=======
   include("component/header.php");
?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4"> 
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-12">
                        <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Category form</h6>
                            <form  method="post" enctype = "multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="cName"  id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">File</label>
                                    <input type="file" name="cImage"  class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" name="addcategory" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                    </div>
                    </div>               
                                
<?php
   include("component/footer.php");
?>
   
>>>>>>> 700f3cd9ea2bb8a3c086ee8c7ad0b8654a6b338e
