<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse :collapse;
            width: 200px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

    </style>
</head>
<body>
    
<?php
echo '<h1> Table of 5</h1>'
?>
<Table border="1">
<?php
for($i=1;$i<=20;$i++){
?>
<TR>
    <td>5</td>
    <td>x</td>
    <td><?php echo $i ?></td>
    <td>=</td>
    <td><?php echo $i*5 ?></td>
</TR>
<?php
}
?>
</table>
</body>
</html>