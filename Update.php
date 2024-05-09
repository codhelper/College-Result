<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "College";

        $conn = mysqli_connect($server,$user,$password,$database);
        
        $user_id = $_POST['enroll'];
        $sub  = $_POST['subject'];
        $value = $_POST['value'];
        $msg = '';

        $query = "select * from result where enroll_no = '$user_id'";
        $check = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($check);

        if($rows > 0){

            try{
                
                $sql = "update result set $sub = '$value' where enroll_no = '$user_id'";
                $result = mysqli_query($conn,$sql);
                
                $msg = 'Query Updated';
            }
            catch(Exception $e){
                $msg = 'Error';
            }
        }
        else {
            $msg = 'check roll number';
        }
        
        echo "  <div class='contains'>
        <div id='cross'>
            <img src='cross.png' alt='CUT' id='cut'>
        </div>
        <div id='content'>
        <div>$msg</div>
        </div>
        
        </div>";
        
        echo "
        <script>const cut = document.querySelector('#cut');
        cut.addEventListener('click', () => {
            let container = document.querySelector('.contains');
            container.style.display = 'none';
        })
        
        </script>";
        
    
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update records</title>
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

    .container2 {
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

    #submit {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #submit:hover {
        background-color: #0056b3;
    }

    .container {
        display: none;
    }
    </style>
</head>

<body>
    <div class="main">

        <div class="navbar">
            <a href="\DataBase Project I\Home.php">Home</a>
            <a href="Admin.php">Admin Page</a>
        </div>
    </div>

    <div class="container2">
        <form action="Update.php" method="POST" id="form">
            <input type="text" name="enroll" id="enroll" placeholder="Enter Roll Id">
            <input type="text" name="subject" id="subject" placeholder="enter subject">
            <input type="text" name="value" id="value" placeholder="enter new marks">
            <input type="submit" value="Submit" id="submit">
        </form>
    </div>

</body>

</html>