<?php
session_start();
unset($_SESSION['sessionEmail']);
<<<<<<< HEAD
echo "<script>alert('User Logout Successfully')
location.assign('index.php')
</script>;"
=======
echo "<script>alert('logout successfully');
location.assign('index.php')
</script>";
>>>>>>> 700f3cd9ea2bb8a3c086ee8c7ad0b8654a6b338e
?>