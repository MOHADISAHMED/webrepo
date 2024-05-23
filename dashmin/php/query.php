<?php
session_start();
include("dbcon.php");

//Category Reference
$catref = "img/category/";
//Product Reference
$proref = "img/product/";
if(isset($_POST['addcategory'])){
$catName = $_POST['cName'];
$catImageName = $_FILES['cImage']['name'];
$catTmpname = $_FILES['cImage']['tmp_name'];
$extension = pathinfo($catImageName,PATHINFO_EXTENSION);
$desig = "img/category/".$catImageName;
if($extension =="jpg" || $extension =="png" || $extension == "jpeg" || $extension =="webp"){
    if(move_uploaded_file($catTmpname,$desig)){
        $query =$pdo->prepare("INSERT INTO `categories`(`catname`, `catimage`) VALUES (:pname,:pimage)");
        $query->bindParam("pname",$catName);
        $query->bindParam("pimage",$catImageName);
        $query->execute();
        echo "<script>alert('Category Added')</script>";
        }else
        {
            echo "<script>alert('fail')</script>";
        
        }
    }else{
    echo "<script>alert('Invalid File Type')</script>";
}
}
//update category
if(isset($_POST['editcategory'])){
    $catid = $_POST['catid'];
    $catName = $_POST['cName'];
    if(!empty($_FILES['cImage']['name'])){  
$catImageName = $_FILES['cImage']['name'];
$catTmpname = $_FILES['cImage']['tmp_name'];
$extension = pathinfo($catImageName,PATHINFO_EXTENSION);
$desig = "img/category/".$catImageName;
if($extension =="jpg" || $extension =="png" || $extension == "jpeg" || $extension =="webp"){
    if(move_uploaded_file($catTmpname,$desig)){
        $query =$pdo->prepare("UPDATE categories set catname = :pname , catimage = :pimage WHERE catid = :pid");
        $query->bindParam("pid",$catid);
        $query->bindParam("pname",$catName);
        $query->bindParam("pimage",$catImageName);
        $query->execute();
        echo "<script>alert('Category Updated')
        location.assign('viewcategory.php')
        </script>";
        }else
        {
            echo "<script>alert('fail')</script>";
        
        }
    }
}
else{
    $query =$pdo->prepare("UPDATE categories set catname = :pname WHERE catid = :pid");
    $query->bindParam("pid",$catid);
    $query->bindParam("pname",$catName);
    $query->execute();
    echo "<script>alert('Category Updated without Image')
    location.assign(viewcategory.php)
    </script>";

}
  }
//delete category
if(isset($_GET['deleteKey'])){
$catid = $_GET['deleteKey'];
$query= $pdo->prepare("DELETE FROM categories Where catid = :pid");
$query->bindParam("pid", $catid);
$query->execute();
echo "<script>alert('Category Deleted');
location.assign('viewcategory.php')
</script>";

}

//Add product
if(isset($_POST['addproduct'])){
$productName = $_POST['pName'];
$productPrice = $_POST['pPrice'];
$productDescription = $_POST['pDescription'];
$productQuantity = $_POST['pQuantity'];
$productCatid = $_POST['pCatid'];
$productImageName = $_FILES['pImage']["name"];
$productTmpName = $_FILES['pImage']["tmp_name"];
$extension = pathinfo($productImageName,PATHINFO_EXTENSION);
$desig = "img/product/".$productImageName;
if($extension =="jpg" || $extension =="png" || $extension == "jpeg" || $extension =="webp") {
    if(move_uploaded_file($productTmpName,$desig)){
        $query = $pdo->prepare("INSERT INTO `products`(`productname`, `productquantity`, `productprice`, `productdescription`, `productimage`, `productcatid`) VALUES(:pn,:pq,:pp,:pd,:pi,:pc)");
        $query->bindParam("pn", $productName);
        $query->bindParam("pq", $productQuantity);
        $query->bindParam("pp", $productPrice);
        $query->bindParam("pd", $productDescription);
        $query->bindParam("pi", $productImageName);
        $query->bindParam("pc", $productCatid);
        $query->execute();
        echo "<script>alert('product added successfully')</script>";

    }else
    {
        echo "<script>alert('invalid file type')</script>";
    
    }
}
}
//delete product
if(isset($_GET['prodeleteKey'])){
    $proid = $_GET['prodeleteKey'];
    $query= $pdo->prepare("DELETE FROM products Where productid = :pid");
    $query->bindParam("pid", $proid);
    $query->execute();
    echo "<script>alert('Product Deleted');
    location.assign('viewproducts.php')
    </script>";
    
    }
//Update product
if(isset($_POST['updateproduct'])){
    $productid = $_POST['pid'];
    $productName = $_POST['pName'];
    $productPrice = $_POST['pPrice'];
    $productDescription = $_POST['pDescription'];
    $productQuantity = $_POST['pQuantity'];
    $productCatid = $_POST['pCatid'];
    $productImageName = $_FILES['pImage']["name"];
    $productTmpName = $_FILES['pImage']["tmp_name"];
    $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
    $desig = "img/product/".$productImageName;
    if($extension =="jpg" || $extension =="png" || $extension == "jpeg" || $extension =="webp") {
        if(move_uploaded_file($productTmpName,$desig)){
            $query = $pdo->prepare("UPDATE `products` SET `productname` = :pn, `productquantity` = :pq, `productprice` = :pp, `productdescription` = :pd, `productimage` = :pi, `productcatid` = :pc WHERE `productid` = :pid");
            $query->bindParam("pn", $productName);
            $query->bindParam("pq", $productQuantity);
            $query->bindParam("pp", $productPrice);
            $query->bindParam("pd", $productDescription);
            $query->bindParam("pi", $productImageName);
            $query->bindParam("pc", $productCatid);
            $query->bindParam("pid", $productid);
            $query->execute();
            echo "<script>alert('product Updated successfully')
            location.assign('viewproducts.php')
            </script>";
    
        }
        else
        {
            echo "<script>alert('invalid file type')</script>";
        
        }
    }else{
        $query = $pdo->prepare("UPDATE `products` SET `productname` = :pn, `productquantity` = :pq, `productprice` = :pp, `productdescription` = :pd, `productcatid` = :pc WHERE `productid` = :pid");
        $query->bindParam("pn", $productName);
        $query->bindParam("pq", $productQuantity);
        $query->bindParam("pp", $productPrice);
        $query->bindParam("pd", $productDescription);
        $query->bindParam("pc", $productCatid);
        $query->bindParam("pid", $productid);
        $query->execute();
        echo "<script>alert('product Updated successfully without image')
        location.assign('viewproducts.php')
        </script>";


    }
    }
    
    //Add User
if(isset($_POST['adduser'])){
    $userName = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userphone = $_POST['userphonenumber'];
    $userpass = $_POST['userpassword'];
    $hashPass = password_hash($userpass,PASSWORD_DEFAULT);
    $userrole = $_POST['userrole'];
    
    $query = $pdo->prepare("INSERT INTO `user`(`username`, `useremail`,`userphonenumber`, `userpassword`, `userrole`) VALUES(:un,:uem,:uph,:upass,:urole)");
    $query->bindParam("un", $username);
    $query->bindParam("uem", $useremail);
    $query->bindParam("uph", $userphone);
    $query->bindParam("upass", $hashPass , PDO::PARAM_STR);
    $query->bindParam("urole", $userrole);
    $query->execute();
    echo "<script>alert('User added successfully')
    location.assign('listusers.php')</script>";
            
    
}

//Update User
if(isset($_POST['updateuser'])){
    $userID = $_POST['userID'];
    $userName = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userphone = $_POST['userphonenumber'];
    $userpass = $_POST['userpassword'];
    $userrole = $_POST['userrole'];
    $hashPass = password_hash($userpass,PASSWORD_DEFAULT);
    $query_role = $pdo->prepare("SELECT userrole FROM user WHERE userid = :uid");
    $query_role->bindParam("uid", $userID);
    $query_role->execute();
    $user_role = $query_role->fetchColumn();

    if ($user_role == 'admin' && $_SESSION['sessionRole'] != 'admin') {
        echo "<script>alert('Admin cannot be edited.');
        location.assign('listusers.php')</script>";
    } else {
        if (!empty($_POST['userpassword'])) {
            $query = $pdo->prepare("UPDATE `user` SET username = :un, useremail = :uem, userphonenumber = :uph, userpassword = :upass, userrole = :urole  WHERE userid = :uid");
            $query->bindParam("upass", $hashPass , PDO::PARAM_STR);
        } else {
            $query = $pdo->prepare("UPDATE `user` SET username = :un, useremail = :uem, userphonenumber = :uph, userrole = :urole  WHERE userid = :uid");
        }

        $query->bindParam("uid", $userID);
        $query->bindParam("un", $userName);
        $query->bindParam("uem", $useremail);
        $query->bindParam("uph", $userphone);
        $query->bindParam("urole", $userrole);
        $query->execute();
        echo "<script>alert('User Updated successfully');
        location.assign('listusers.php')</script>";
    }
}

//delete User
if (isset($_GET['userdeleteKey'])) {
    $userid = $_GET['userdeleteKey'];
    $query_role = $pdo->prepare("SELECT userrole FROM user WHERE userid = :uid");
    $query_role->bindParam("uid", $userid);
    $query_role->execute();
    $user_role = $query_role->fetchColumn();

    if ($user_role === 'superadmin') {
        echo "<script>alert('Super Admin cannot be deleted.');
        location.assign('listusers.php')</script>";
    } else {
        $query_delete = $pdo->prepare("DELETE FROM user WHERE userid = :uid");
        $query_delete->bindParam("uid", $userid);
        $query_delete->execute();
        echo "<script>alert('User Deleted');
        location.assign('listusers.php')</script>";
    }
}
?>