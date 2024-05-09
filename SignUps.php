<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "College";

        $conn = mysqli_connect($server,$user,$password,$database);


        $name = $_POST['name'];
        $enroll = $_POST['enroll'];
        $password = $_POST['password'];
        $confirm = $_POST['cpassword'];

        //check if student exist
        $sql = "select * from students where enroll_no = '$enroll'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        $msg = '';
        $link = '';
        $value = '';
        if($num > 0){
            //it means one record is present for given enrollment
            // echo "<script>window.alert('You are already logged in')</script>";
            // echo "<script>window.location.href = 'Home.php'</script>";
            $msg = 'Records already found';
            $link = 'Home.php';
            $value = 'Back';
        }
        else {

            if($password == $confirm && $password !== ''){
                $query = "insert into students values ('$name','$enroll','$password')";
                $command = mysqli_query($conn,$query);
                // echo "<script>window.location.href = 'Home.php'</script>";
                $msg = 'Successfully signed up';
                $link = 'St_Login.php';
                $value = 'Next';
            }
            else {
                $msg = 'Password did not match ';
                $link = 'Home.php';
                $value = 'Back';
            }
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
<html>
<head>
    <title>Student SignUp</title>
    <link rel="stylesheet" href="Administrator/style.css">
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
            background-color: #f2f9fd; /* Light gray */

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
        .container{
            display : none;
        }
    </style>
</head>
<body>
<div class="main">

<div class="navbar">
    <a href="Home.php">Home</a>
    <a href="St_Login.php">Login</a>
</div>
</div>

    <div class="container2">
        <form action="SignUps.php" method="POST" id="form">
            <input type="text" name="name" id="name" placeholder="Enter Name">
            <input type="text" name="enroll" id="enroll" placeholder="Enter Roll Id">
            <input type="password" name="password" id="password" placeholder="Enter password" maxl>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password">
            <input type="submit" value="Submit" id="submit">
        </form>
    </div>

    <div class="container">
        <div id="cross">
            <img src="Administrator/cross.png" alt="CUT" id="cut">
        </div>
        <div id="content">
            <div>You didn't login</div>
        </div>
        <div id="ok">
            <input type="submit" name="submit" id="btn">
        </div>
    </div>

    
</body>
</html>
