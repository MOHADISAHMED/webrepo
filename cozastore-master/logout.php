<?php
session_start();
unset($_SESSION['sessionEmail']);
echo "<script>alert('User Logout Successfully')
location.assign('index.php')
</script>;"
?>