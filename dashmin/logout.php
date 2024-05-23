<?php
session_start();
session_unset();
echo "<script>alert('User Logout Successfully')
location.assign('../cozastore-master/index.php')
</script>;"
?>