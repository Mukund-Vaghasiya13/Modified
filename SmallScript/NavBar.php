<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav {
            position: sticky;
            /* Change from sticky to fixed */
            top: 0;
            /* This keeps it fixed to the top of the viewport */
            left: 0;
            right: 0;
        }

        .main-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 90px;
            background-color: rgba(255, 255, 255, 0.941);
            padding: 0 10px;
            width: 100%;
        }

        .logoDiv {
            display: flex;
            flex-direction: row;
            height: fit-content;
            justify-content: center;
            align-items: center;

        }

        .logo {
            height: 50px;
            width: 50px;
            padding: 10px;
            box-sizing: content-box;
        }

        .catlog_title {
            color: black;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="main-nav">
            <div class="logoDiv">
                <img src="../uploads/assets/Atlas.svg" class="logo" alt="logo">
                <h1 class="catlog_title">Atlas</h1>
            </div>
        </div>
    </nav>
</body>

</html>