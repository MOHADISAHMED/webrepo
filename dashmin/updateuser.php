<?php
include('component/header.php');
if(isset($_GET['uid'])){
    $userstringid = $_GET['uid'];
    $query = $pdo->prepare("SELECT * FROM user WHERE userid = :uid");
    $query->bindParam("uid",$userstringid);
    $query->execute();
    $userData = $query->fetch(PDO::FETCH_ASSOC);
}

?>

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update User</h6>
                    <form method="post">
                    <input type="hidden" value="<?php echo $userData['userid']?>" name="userID">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="username" class="form-label">Name<span style="color:red;"> *</span></label>
                            <input type="text" placeholder="Name" class="form-control" name="username" id="username" required value="<?php echo $userData['username']?>">
                            
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="userEmail" class="form-label">Email<span style="color:red;"> *</span></label>
                            <input required type="email" class="form-control" name="useremail" placeholder="Your Email Address" value="<?php echo $userData['useremail']?>">
                            
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="userphone" class="form-label">Phone Number<span style="color:red;"> *</span></label>
                            <input required type="tel" class="form-control" name="userphonenumber" placeholder="Phone Number" value="<?php echo $userData['userphonenumber']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="userpassword" placeholder="Password">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            
                            
                            <label for="userrole" class="form-label">User Role<span style="color:red;"> *</span></label>
                        
                            <select type="text" class="form-control" name="userrole" id="userRole" >
                                <option selected hidden value="<?php echo $userData['userrole']?>"><?php echo $userData['userrole']?></option>
                                <option value="admin">Admin</option>
                                <option value="customer">Customer</option>
                                <option value="shop_manager">Shop Manager</option>
                                <option value="sales_person">Sales Person</option>
                            
                            </select>
                                
                        </div>
                    </div>
                        
                        <button type="submit" class="btn btn-primary" name="updateuser">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




<?php
include('component/footer.php');

?>