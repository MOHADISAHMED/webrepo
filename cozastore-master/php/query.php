<?php
session_start();
//session_unset();
$catImageRef= "../dashmin/img/category/";
$proImageRef= "../dashmin/img/products/";
include('dbcon.php');
if(isset($_POST['register'])){
    $userName = $_POST['name'];
    $userPassword = $_POST['password'];
    $userEmail = $_POST['email'];
    $userNumber = $_POST['ContactNumber'];
    $query= $pdo->prepare("insert into user(userName,userPassword,userEmail,userContact)VALUES(:un,:up,:ue,:unum)");
    $query->bindParam("un",$userName);
    $query->bindParam("ue",$userEmail);
    $query->bindParam("up",$userPassword);
    $query->bindParam("unum",$userNumber);
    $query->execute();
echo "<script>alert('User added successfully')
location.assign('register.php')
</script>";
}

//login
if(isset($_POST['login'])){
    $useremail= $_POST['email'];
    $userPassword=$_POST['password'];
    $query=$pdo->prepare("select * from user where userEmail= :ue && userPassword= :up");
    $query->bindParam("ue",$useremail);
    $query->bindParam("up",$userPassword);
    $query->execute ();
    $userData = $query->Fetch(PDO::FETCH_ASSOC);
    if($userData) {
        $_SESSION ['sessionEmail']= $userData['userEmail'];
        $_SESSION ['sessionId']= $userData['userid'];
        $_SESSION ['sessionPhone']= $userData['userphone'];
        $_SESSION ['sessionName']= $userData['userName'];
        $_SESSION ['sessionPassword']= $userData['userPassword'];
        $_SESSION ['sessionRole'] = $userData['userrole'];
        if($_SESSION['sessionRole'] == "user"){
            echo "<script>alert('logged in succesfully');location.assign('customer.php')</script>";
        } else {
            echo "<script>alert('logged in succesfully');location.assign('../dashmin/index.php')</script>"; 
        }
    }
}

// add to cart
if (isset($_POST['addToCart'])) {
    $pId = $_POST['proId'];
    $pName = $_POST['proName'];
    $pPrice = $_POST['proPrice'];
    $pQuantity = $_POST['proQuantity'];
    $pImage = $_POST['proImage'];
    if (isset($_SESSION['cart'])) {
        $cartExist = false;

        foreach ($_SESSION['cart'] as $key => $values) {
            if ($values['pId'] == $pId) {

                $_SESSION['cart'][$key]['pQuantity'] += $pQuantity;
                $cartExist = true;
                echo "<script>alert('cart has been updated')</script>";
                break;
            }
        }
        if (!$cartExist) {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count]
                = array("pId" => $pId, "pName" => $pName, "pQuantity" => $pQuantity, "pPrice" => $pPrice, "pImage" => $pImage);
            echo "<script>alert('product add into cart')</script>";
        }
    } else {
        $_SESSION['cart'][0] = array("pId" => $pId, "pName" => $pName, "pQuantity" => $pQuantity, "pPrice" => $pPrice, "pImage" => $pImage);
        echo "<script>alert('product add into cart')</script>";
    }
}
// delete item
if (isset($_GET['deleteCart'])) {
    $CartID = $_GET['deleteCart'];
    foreach ($_SESSION['cart'] as $key => $values) {
        if ($values['pId'] == $CartID) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "<script>alert('product remove from cart');
            location.assign('shoping-cart.php');
            </script>";
        }
    }
}

// placeorder
if (isset($_POST['orderPlace'])) {
    date_default_timezone_set("Asia/karachi");
    $now = time();
    $dateString = date("Y-m-d H:i:s", $now);
    $time = date("H:i:s", strtotime($dateString));
    $userId = $_SESSION['sessionId'];
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPhone = $_POST['phone'];
    foreach ($_SESSION['cart'] as $orderkey => $ordervalues) {
        $proId = $ordervalues['pId'];
        $proName = $ordervalues['pName'];
        $proQuantity = $ordervalues['pQuantity'];
        $proPrice = $ordervalues['pPrice'];
        $proImage = $ordervalues['pImage'];
        $orderQuery = $pdo->prepare("INSERT INTO `orders`( `productName`, `productPrice`, `productQuantity`, `userid`, `productid`, `orderDate`, `orderTime`, `productImage`)  VALUES(:opn,:opp,:opq,:oui,:opi,:od,:ot,:opim)");
        $orderQuery->bindParam("opn", $proName);
        $orderQuery->bindParam("opq", $proQuantity);
        $orderQuery->bindParam("opp", $proPrice);
        $orderQuery->bindParam("oui", $userId);
        $orderQuery->bindParam("opi", $proId);
        $orderQuery->bindParam("od", $dateString);
        $orderQuery->bindParam("ot", $time);
        $orderQuery->bindParam("opim", $proImage);
        $orderQuery->execute();
    }
    $itemCount = count($_SESSION['cart']);
    $pQuantityCount = 0;
    $pTotal = 0;
    $invoiceQuery = $pdo->prepare("INSERT INTO `invoices`( `userid`, `userEmail`, `userName`, `itemCount`,  `invoiceDate`, `invoiceTime`,) VALUES(:iui,:iue,:iun,:itc,:id,:it:itq,:ita) ");

    $invoiceQuery->bindParam("iui", $userId);
    $invoiceQuery->bindParam("iue", $userEmail);
    $invoiceQuery->bindParam("iun", $userName);
    $invoiceQuery->bindParam("itc", $itemCount);
    $invoiceQuery->bindParam("id", $dateString);
    $invoiceQuery->bindParam("it", $time);
    foreach ($_SESSION['cart'] as $invoicevalues) {
        $pQuantityCount += $invoicevalues['pQuantity'];
        $pTotal += $invoicevalues['pQuantity'] * $invoicevalues['pPrice'];
    }
    $invoiceQuery->bindParam("itq", $pQuantityCount);
    $invoiceQuery->bindParam("ita", $pTotal);
    $invoiceQuery->execute();
    unset($_SESSION['cart']);
    echo "<script>alert('order placed successfully');
    location.assign('index.php');
    </script>";
}
?>