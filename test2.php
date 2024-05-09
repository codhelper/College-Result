<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .container {
        height: 18vh;
        width: 30vw;
        border: 4px solid black;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

    }

    #cross {
        display: flex;
        justify-content: end;
        height: 5vh;
    }

    #content {
        display: flex;
        justify-content: center;
    }

    #ok {
        display: flex;
        justify-content: center;
        height: 5vh;
        /* background-color: red; */
        margin-top: 10%;
    }

    img {
        margin-right: 3px;
    }

    #btn {
        height: 30px;
        width: 70px;
        background-color: greenyellow;
    }

    img:hover {
        border: 2px solid darkgray;
    }

    #btn:hover {
        border: 3px solid black;

    }
    </style>
</head>

<body>


    
    <div class="container">
        <div id="cross">
            <img src="cross.png" alt="CUT" id="cut">
        </div>
        <div id="content">
            <div>You didn't login</div>
        </div>
        <div id="ok">
            <input type="submit" name="submit" id="btn">
        </div>
    </div>
    <script>
    const cut = document.querySelector('#cut');
    cut.addEventListener('click', () => {
        let container = document.querySelector('.container');
        container.style.display = 'none';
    })

    const btn = document.querySelector('#btn');
    btn.addEventListener('click', () => {
        window.location.href = 'Admin.php';
    })
    </script>
</body>

</html>