<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Result</title>
    <link rel="stylesheet" href="style2.css">
    <style>
    #form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 20vh;
        width: 25vw;
        border: 2px solid grey;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
        background-color: wheat;
    }

    #user_id {
        outline: none;
        border: none;
        border-bottom: 1px solid gray;
        width: 15vw;
        height: 3vh;
    }

    #btn {
        background-color: yellowgreen;
        height: 5vh;
        width: 10vw;
    }

    #btn:hover {
        border: 5px solid black;
    }

    .container div {
        text-align: center;
    }

    body {
        box-sizing: border-box;
    }

    .container {
        border: 2px solid black;
        border-top: 0px;
        height: auto;
        width: auto;
        width: 60vh;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .parent {
        height: 7vh;
        width: 60vh;
        display: flex;
        border-top: 2px solid black;
    }

    .parent div {
        width: 50%;
        height: 100%;
        overflow: hidden;
    }

    #d1 {
        background-color: #7091E6;
        /* background-color: aqua; */
    }

    #d2 {
        /* background-color: blue; */
        background-color: #7091E6;
        border-left: 2px solid black;
    }

    .marks,
    .sub {

        background-color: #0fa4af;
        color: #e28743;
        font-size: 2rem;
    }

    #par {}
    </style>
</head>

<body>
<div class="main">

<div class="navbar">
    <a href="\DataBase Project I\Home.php">Home</a>
    <a href="St_Login.php">Login</a>
    <a href="ResultPage.php">Reset</a>
</div>
</div>

    <form action="ResultPage.php" method="POST" id="form">

        <input type="text" name="user_id" id="user_id" placeholder="Enter Roll Id">

        <input type="submit" name="submit" id="btn">

    </form>

    <script src="script.js"></script>
</body>

</html>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "College";

    $conn = mysqli_connect($server,$user,$password,$database);

    
    
    //check for login
    $enroll = $_POST['user_id'];

    $sql = "select * from result where enroll_no = '$enroll'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    
    if($num >= 1 ){
        $java = $row['JAVA'];
        
        $dsa = $row['DSA'];
        
        $dbms = $row['DBMS'];
        
        $ai = $row['AI'];
        
        $cn = $row['COMPUTER_NETWORK'];


        echo "<div class='container'>
        <div>
        <div class='parent'>
        <div id='d' class='id'>Enrollment Number</div>
        <div id='d' class = 'val'>$enroll</div>
        </div>
        </div>
        <div class='parent'>
        <div  class='sub'>Subjects</div>
        <div class = 'marks'>Marks</div>
        </div>
        <div class='parent'>
            <div id='d1'>AI</div>
            <div id='d2'>$ai</div>
        </div>
        <div class='parent'>
        <div id='d1'>DSA</div>
        <div id='d2'>$dsa</div>
        </div>
        <div class='parent'>
        <div id='d1'>JAVA</div>
        <div id='d2'>$java</div>
        </div>
        <div class='parent'>
        <div id='d1'>COMPUTER NETWORK</div>
            <div id='d2'>$cn</div>
            </div>
        <div class='parent'>
        <div id='d1'>DATA BASE MANAGEMENT SYSTEM</div>
        <div id='d2'>$dbms</div>
        </div>
        </div>";
        
    }
    else {
        echo "  <div class='contains'>
    <div id='cross'>
        <img src='Administrator/cross.png' alt='CUT' id='cut'>
    </div>
    <div id='content'>
        <div>Result not found</div>
    </div>
    <div id='ok'>
        <input type='submit' value='Try Again' id='button'>
    </div>
    </div>";

    echo "
    <script>const cut = document.querySelector('#cut');
    cut.addEventListener('click', () => {
        let container = document.querySelector('.contains');
        container.style.display = 'none';
    })
    
    const btn = document.querySelector('#button');
    btn.addEventListener('click', () => {
        window.location.href = 'ResultPage.php';
    })</script>";
    }
}
?>