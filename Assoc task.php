<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse:collapse;
        width:auto;
        border-width: 3px;
    }
    th{
        padding: 10px        ;
    }

    </style>
</head>
<body>
    <h1>Associative Array</h1>
    <table border=1>
 
<tbody>
    <?php
        
    $assoc =[
        [
        "Name" => "Ali",
        "Course" => "Full Stack Develpoment",
        "Join date" => "20-02-2024"
        ],
       [ "Name" => "Ali",
        "Course" => "Full Stack Develpoment",
        "Join date" => "20-02-2024"
    ],
        [
            "Name" => "Ali",
        "Course" => "Full Stack Develpoment",
        "Join date" => "20-02-2024"
        ]
        
    ];
    ?>
    <tr>
        <th>Name</th>
        <th>Course</th>
        <th>Date</th>
    </tr>
    <?php
    foreach($assoc as $assoc){
        ?>
    <tr>
        <?php
    foreach($assoc as $key => $value){

        echo "<th><stong>".  $value ."</th></strong>";
    }
    ?>
    </tr>
    <?php 
}

    ?>
    
</tbody>
    </table>
</body>
</html>