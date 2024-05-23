<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

include('dbcon.php');
session_start();
//session_unset();
//Category Reference
$catref = "../dashmin/img/category/";
//Product Reference
$proref = "../dashmin/img/product/";
//user  Add User
if(isset($_POST['register'])){
    $username = $_POST['name'];
    $useremail = $_POST['email'];
    $userphone = $_POST['phonenumber'];
    $userpassword = $_POST['password'];
    $userrole = "customer";
    $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);
    $query = $pdo->prepare("INSERT INTO `user`(`username`, `useremail`, `userphonenumber`, `userpassword`,userrole) VALUES (:uname,:uemail,:uphone,:upass,:urole)");
    $query->bindParam("uname",$username);
    $query->bindParam("uemail",$useremail);
    $query->bindParam("uphone",$userphone);
    $query->bindParam("upass", $hashedPassword);
    $query->bindParam("urole",$userrole);
    $query->execute();
    echo "<script>alert('User Registration Successful Added');
    location.assign(customerdashboard.php)</script>";
}


//user  update User
if(isset($_POST['updatedetails'])){
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userphone = $_POST['userphone'];
    $query = $pdo->prepare("UPDATE user SET username = :uname,  userphonenumber = :uphone, useremail = :uemail WHERE userid = :uid");
    $query->bindParam("uid",$userid);
    $query->bindParam("uname",$username);
    $query->bindParam("uemail",$useremail);
    $query->bindParam("uphone",$userphone);
    $query->execute();
    // Update session data if the update was successful
    // if ($query->rowCount() > 0) {
    //     $_SESSION['firstname'] = $userfirstname;
    //     $_SESSION['lastname'] = $userlastname;
    //     $_SESSION['useremail'] = $useremail;
    //     $_SESSION['userphone'] = $userphone;
    //     echo "<script>alert('User Update Successful');
    //     location.assign('my-account.php')</script>";
    // } else {
    //     echo "<script>alert('User Update Failed');
    //     location.assign('my-account.php')</script>";
    // }
}

// user logins
    
if(isset($_POST['login'])){
    $useremail = $_POST['custemail'];
    $userpassword = $_POST['custpassword'];
    $query = $pdo->prepare("SELECT * FROM user WHERE useremail=:ue");
    $query->bindParam("ue",$useremail);
    $query->execute();
    $userData = $query->FETCH(PDO::FETCH_ASSOC);
    if($userData){
        // Verify the provided password against the hashed password stored in the database
        if(password_verify($userpassword, $userData['userpassword'])){
            $_SESSION['sessionid'] = $userData['userid'];
            $_SESSION['sessionName'] = $userData['username'];
            $_SESSION['sessionEmail'] = $userData['useremail'];
            $_SESSION['sessionPhonenumber'] = $userData['userphonenumber'];
            $_SESSION['sessionRole'] = $userData['userrole'];
            $_SESSION['sessionPassword'] = $userData['userpassword'];
            if($_SESSION['sessionRole'] == "user" || $_SESSION['sessionRole'] == "customer" ){
                echo "<script>alert('User Login Successful');
                location.assign('customerdashboard.php');
                </script>";
            }
            elseif($_SESSION['sessionRole'] == "admin" || $_SESSION['sessionRole'] == "superadmin" || $_SESSION['sessrole'] == "shop_manager" || $_SESSION['sessrole'] == "sales_person" ){
                echo "<script>alert('Admin Login Successful');
                location.assign('../dashmin/index.php')</script>";
            }
        }else{
            echo "<script>alert('Incorrect password');</script>";
        }
        
    }else{
        echo "<script>alert('User Not Found');</script>";
    }
}



//user  update User Password
if(isset($_POST['updatePassword'])){
    $oldPass = $_POST['oldPass'];
    $newuserpass = $_POST['newPass'];
        $hashedPassword = password_hash($newuserpass, PASSWORD_DEFAULT);
        $querycheck = $pdo->prepare("SELECT userpassword FROM user WHERE userid=:ui");
        $querycheck->bindParam("ui",$_SESSION['sessionid']);
        $querycheck->execute();
        $userData = $querycheck->FETCH(PDO::FETCH_ASSOC);
        if(password_verify($oldPass, $userData['userpassword'])){
            $queryupdate = $pdo->prepare("UPDATE user SET userpassword = :upass WHERE userid = :ui ");
            $queryupdate->bindParam("ui",$_SESSION['sessionid']);
            $queryupdate->bindParam("upass", $hashedPassword, PDO::PARAM_STR);
            $queryupdate->execute();
            echo "<script>alert('Password Is Updated');</script>";
        }else{
            echo "<script>alert('Old Password Is Wrong');</script>";
        }
    }
//add to cart
if (isset($_POST['addtocart'])) {
    $pId = $_POST['proId'];
    $pName = $_POST['proName'];
    $pPrice = $_POST['proPrice'];
    $pQuantity = $_POST['proQuantity'];
    $pImage = $_POST['proImage'];
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count]
            = array("pId" => $pId, "pName" => $pName, "pQuantity" => $pQuantity, "pPrice" => $pPrice, "pImage" => $pImage);
        echo "<script>alert('product add into cart')</script>";
    } else {
        $_SESSION['cart'][0] = array("pId" => $pId, "pName" => $pName, "pQuantity" => $pQuantity, "pPrice" => $pPrice, "pImage" => $pImage);
        echo "<script>alert('product add into cart')</script>";
    }
}
// delete item
if (isset($_GET['deletecart'])) {
    $CartID = $_GET['deletecart'];
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
if (isset($_POST['checkout'])) {
    date_default_timezone_set("Asia/karachi");
    $now = time();
    $dateString = date("Y-m-d H:i:s", $now);
    $time = date("H:i:s", strtotime($dateString));
    // echo "<script>
    // alert('" . $dateString . "')
    // alert('" . $time . "')</script>";
    function confirmationcode (){
        $code = str_pad(rand( 0 , pow(10,6)-1), 6, 0,STR_PAD_LEFT);
        return $code;
    }
    $confirmationcode = confirmationcode();
    $userId = $_SESSION['sessionid'];
    $userName = $_POST['username'];
    $userEmail = $_POST['useremail'];
    $userPhone = $_POST['userphonenumber'];
    // var_dump($userId);
    // die();
    foreach ($_SESSION['cart'] as $orderkey => $ordervalues) {
        $proId = $ordervalues['pId'];
        $proName = $ordervalues['pName'];
        $proQuantity = $ordervalues['pQuantity'];
        $proPrice = $ordervalues['pPrice'];
        $proImage = $ordervalues['pImage'];
       
        $orderQuery = $pdo->prepare("INSERT INTO `orders`(`productid`, `productname`, `productprice`, `productquantity`, `userid`, `orderdate`, `ordertime`, `productimage`, `confirmationcode`) VALUES(:opi,:opn,:opp,:opq,:oui,:od,:ot,:opim,:cc)");
        $orderQuery->bindParam("opi", $proId);
        $orderQuery->bindParam("opn", $proName);
        $orderQuery->bindParam("opq", $proQuantity);
        $orderQuery->bindParam("opp", $proPrice);
        $orderQuery->bindParam("oui", $userId);
        $orderQuery->bindParam("opim", $proImage);
        $orderQuery->bindParam("od", $dateString);
        $orderQuery->bindParam("ot", $time);
        $orderQuery->bindParam("cc", $confirmationcode);
        $orderQuery->execute();
    }
    $itemCount = count($_SESSION['cart']);
    $pQuantityCount = 0;
    $pTotal = 0;
    $invoiceQuery = $pdo->prepare("INSERT INTO `invoices`(`userid`, `useremail`, `username`, `itemcount`, `totalquantity`, `totalamount`, `invoicedate`, `invoicetime`, `confirmationcode`) VALUES(:iui,:iue,:iun,:itc,:itq,:ita,:id,:it,:icc) ");

    $invoiceQuery->bindParam("iui", $userId);
    $invoiceQuery->bindParam("iue", $userEmail);
    $invoiceQuery->bindParam("iun", $userName);
    $invoiceQuery->bindParam("itc", $itemCount);
    $invoiceQuery->bindParam("id", $dateString);
    $invoiceQuery->bindParam("it", $time);
    $invoiceQuery->bindParam("icc", $confirmationcode);
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
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mohadistanoli832@gmail.com';                     //SMTP username
        $mail->Password   = 'kqurwjpplxiiqmyn';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('mohadistanoli832@gmail.com', 'mohadis');
        $mail->addAddress($userEmail, 'sessionName');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'confirmation of order';
        $mail->Body    = 'dear'.$_SESSION['sessionName'].'your order confirmation code is'.$confirmationcode.'</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>