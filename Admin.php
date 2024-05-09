<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "College";

        $conn = mysqli_connect($server,$user,$password,$database);
        
        $sql = "select * from result";
        $result = mysqli_query($conn,$sql);
        
        $num = mysqli_num_rows($result);
    //     echo var_dump($row);
    //     $java = $row['JAVA'];
    //     echo "<div>$java</div>";
    //    }
    
    echo "<div class= 'table'>";
    echo "
    <div class='heading'>

        <div><center>Enrollment</center></div>
        <div><center>JAVA</center></div>
        <div><center>DSA</center></div>
        <div><center>COMPUTER NETWORK</center></div>
        <div><center>AI</center></div>
        <div><center>DBMS</center></div>
    </div>";
    
    for($i = 1 ; $i <= $num; $i++){
        $row = mysqli_fetch_assoc($result);
        $enroll = $row['ENROLL_NO'];
        $java = $row['JAVA'];
        $dsa = $row['DSA'];
        $dbms = $row['DBMS'];
        $cn = $row['COMPUTER_NETWORK'];
        $ai = $row['AI'];
        echo "
        <div class='records'>

        <div><center>$enroll</center></div>
        <div><center>$java</center></div>
        <div><center>$dsa</center></div>
        <div><center>$cn</center></div>
        <div><center>$ai</center></div>
        <div><center>$dbms</center></div>
    </div>";
    }
    echo "</div>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins's Page</title>
    <link rel="stylesheet" href="style2.css">
    <style>
    .container {
        margin: 140px;

    }
    .table{
        border : 4px solid black;
        width: 60vw;
        position : absolute;
        top : 40%;
        left : 50%;
        transform : translate(-50%,-50%);
    }
    .heading {
        display : flex;
        justify-content : space-evenly;
        background-color: gray;
        align-items : center;
        height : 40px;
        color : red;
    }
    .heading div{
        /* height : 40px; */
        width : 150px;
        border-left : 2px solid green;
    }
    .records div{
        width : 150px;
        border-left : 2px solid green;
        
    }
    .records{
        display : flex;
        justify-content : space-evenly;
        background-color: wheat;
        align-items : center;
        height : 40px;

        border-top : 2px solid black;
    }
    
    </style>
</head>

<body>
<div class="main">

<div class="navbar">
    <a href="\DataBase Project I\Home.php">Home</a>
    <a href="\DataBase Project I\AD_Login.php">Administrator Login</a>
</div>
</div>

    <div class="container">
        <h4><a href="insert.php">Insert Marks</a></h4>
        <h4><a href="update.php">Update Marks</a></h4>
        <h4><a href="delete.php">Delete Records</a></h4>
        <form action="Admin.php" method="post">
            <input type="submit" name="submit" value='show records'>
        </form>
    </div>
    
</body>

</html>