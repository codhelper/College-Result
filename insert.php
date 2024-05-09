<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Records</title>
    <style>
    form {
        width: 30vw;
        border: 2px solid green;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* display : flex; */
        /* flex-wrap : wrap;  */
        background-color: green;
    }

    label {
        display: inline;
        width: 50%;
    }

    input {
        /* border : none; */
        outline: none;
        display: inline;
        /* margin-left : 80%; */
        width: 50%;
    }

    form div {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        border: 2px dotted gray;
    }
    </style>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
<div class="main">

<div class="navbar">
    <a href="\DataBase Project I\Home.php">Home</a>
    <a href="Admin.php">Admin Page</a>
</div>
</div>

    <form action="insert.php" method="post">
        <div>

            <label for="enroll">Enrollment No.</label>
            <input type="text" name="user_id" id="enroll"><br> <br>
        </div>

        <div>

            <label for="dbms">DBMS</label>
            <input type="text" name="dbms" id="dbms"><br> <br>
        </div>

        <div>

            <label for="c_n">COMPUTER NETWORK</label>
            <input type="text" name="c_n"><br> <br>
        </div>

        <div>

            <label for="dsa">DATA STRUCTURE</label>
            <input type="text" name="dsa" id="dsa"><br> <br>
        </div>

        <div>

            <label for="java">JAVA</label>
            <input type="text" name="java" id="java"><br> <br>
        </div>

        <div>

            <label for="AI">AI</label>
            <input type="text" name="AI" id="AI"><br> <br>
        </div>
        <div>

            <input type="submit" name="submit">
        </div>
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
        $user_id = $_POST['user_id'];
        $dbms  = $_POST['dbms'];
        $cn = $_POST['c_n'];
        $java = $_POST['java'];
        $dsa = $_POST['dsa'];
        $ai = $_POST['AI'];

        $sql = "select * from result where enroll_no = '$user_id' ";
            $result = mysqli_query($conn,$sql);

            $num = mysqli_num_rows($result);
            
        $msg = '';
        if($user_id === ''){
            $msg = 'Enter roll id';
        }
        else if($num == 1){
            $msg = 'Enrollment already found';
        }
        else {

            try {
                
                $sql = "insert into result values ('$user_id','$dbms','$cn','$java','$dsa','$ai')";
                $result = mysqli_query($conn,$sql);
                $msg = 'Database updated';
            }
            catch(Exception $e){
                $msg = "Can't store negative marks";
            }
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