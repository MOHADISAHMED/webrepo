<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Values of Indexes</h1>
    <?php
    $array=["BMW","Volvo","Toyota","Honda"];
    // echo $array[1]."<br>";
    // var_dump($array)."<br>";
    // print_r($array);
    ?>
    <ul>
    <?php
    for($i=0;$i<count($array);$i++){
        ?>
        
    <li><?php echo $array[$i]." ";?></li>
  
<?php    
}
     ?>
     
</body>
</html>