<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <link rel="stylesheet" href="style2.css">
    <style>
    .form {
        border: 2px solid green;
        width: 30vw;
        height : 20vh;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display : flex;
        flex-direction : column;
        align-items : center;
        justify-content : space-around;
    }

    #admin {
        width : 50%;
        height : 20%;
        outline : none;
        /* border : none; */
    }
    #password{
        outline : none;
        border : none;
        border-bottom : 1px solid red;
        width : 40%;
    }
    #submit{
        background-color: #fff;
    }
    </style>
</head>

<body>
<div class="main">

<div class="navbar">
    <a href="Home.php">Home</a>
</div>
</div>

    <form action="AD_Login.php" method='post' class='form'>
        <select name="admin" id="admin">
            <option value="1121">Rajeev</option>
            <option value="2213">Sumit</option>
            <option value="9921">Bob</option>
        </select><br><br>
        <input type="password" name="password" id="password" placeholder='enter password'>

        <input type="submit" name="submit" id='submit'>

    </form>
</body>

</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $server = "localhost";
            $user = "root";
            $password = "";
            $database = "College";
    
            $conn = mysqli_connect($server,$user,$password,$database);

            $roll = $_POST['admin'];
            $password = $_POST['password'];

            $sql = "select * from teacher where password = '$password' ";
            $result = mysqli_query($conn,$sql);

            $num = mysqli_num_rows($result);
            if($num == 1){

                echo "<script> window.location.href = 'Administrator/Admin.php' </script>";
            }
            else {
                echo "  <div class='contains'>
        <div id='cross'>
            <img src='Administrator/cross.png' alt='CUT' id='cut'>
        </div>
        <div id='content'>
            <div>Incorrect Password</div>
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
        
    }
?>