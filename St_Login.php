<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "College";

        $conn = mysqli_connect($server,$user,$password,$database);
        
        //check for login
        $enroll = $_POST['user_id'];
        $password = $_POST['password'];
        
        // check is this record present in database
        $sql = "select * from students where enroll_no = '$enroll' and password = '$password'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        $query2 = "select * from students where enroll_no = '$enroll'";
        //this query used when user is login and making incorrect password
        $result2 = mysqli_query($conn,$query2);
        $num2 = mysqli_num_rows($result2);

        $msg = '';
        $link = '';
        $value = '';
       
        
        echo $num2; 
        if($num == 1){
            echo "<script> window.location.href = 'ResultPage.php' </script>";
            // $msg = 'Incorrect Password';
            // $link = 'Home.php';
            // $value  = 'Back';
        }
        else if($num2 == 1 ) {
            $msg = 'Incorrect Password';
            $link = 'Home.php';
            $value  = 'Back';
        }
        else {
            $msg = 'You did not created any account , go to sign up';
            $link = 'SignUps.php';
            $value = 'Go';
        }

        echo "  <div class='contains'>
        <div id='cross'>
            <img src='Administrator/cross.png' alt='CUT' id='cut'>
        </div>
        <div id='content'>
            <div>$msg</div>
        </div>
        <div id='ok'>
            <input type='submit' value='$value' id='button'>
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
            window.location.href = '$link';
        })</script>";
    }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="style2.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        background-color: red;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f2f9fd;
        /* Light gray */

    }

    .container {
        background-color: #f0f0f0;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    input[type="text"],
    input[type="password"] {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <div class="main">

        <div class="navbar">
            <a href="\DataBase Project I\Home.php">Home</a>
            <a href="SignUps.php">Sign Up</a>
        </div>
    </div>
    <div class="container">
        <form action="St_Login.php" method="POST" id="form">

            <input type="text" name="user_id" id="user_id" placeholder="Enter Roll Id">
            <input type="password" name="password" id="password" placeholder="Enter password">
            <input type="submit" value="check Result">
        </form>
    </div>
</body>