
<?php
include ("component/header.php");
if(isset($_GET['Cid'])){
    $catstringid = $_GET['Cid'];
    $query = $pdo->prepare("SELECT * FROM categories WHERE catid=:pid");
    $query-> bindParam("pid",$catstringid);
    $query->execute();
    $catData = $query->fetch(PDO::FETCH_ASSOC);
}
?>
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded mx-0">
                    <div class="col-md-12 ">
                       <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Update Category</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="hidden" name="catid" value="<?php echo $catData['catid']?>">
                                    <label for="exampleInputEmail1" class="form-label">Change Category Name</label>
                                    <input type="text" name="cName" class="form-control" value="<?php echo $catData['catname']?>">
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Change file</label>
                                    <input type="file" name="cImage" class="form-control" id="exampleInputPassword1"><img src="<?php echo $catref.$catData['catimage']?>"width="80" alt="">
                                </div>
                                <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
                                <button type="submit" name="editcategory" class="btn btn-primary">Update Category</button>
                            </form>
</div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php
include ("component/footer.php");
?>