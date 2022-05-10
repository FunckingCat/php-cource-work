<?php
    session_start();
    include './backend/get_data.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP course work login page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body class="container">
    <section class="login-section min-vh-100 d-flex justify-content-center align-items-center m-0">
        <!-- Pills navs -->

        <div class="">
            <h1>Войти</h1>
            <form method="post" action="./backend/registration.php">

                <div class="form-outline mb-4">
                    <input type="email" id="loginUsername" name="email" class="form-control" />
                    <label class="form-label" for="loginUsername">Login (email)</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="loginPassword" name="password" class="form-control" />
                    <label class="form-label" for="loginPassword">Password</label>
                </div>
                <input type="text" name="type" value="log" style="display: none;">
                <button type="submit" class="btn btn-dark btn-block mb-4">Войти</button>

            </form>
            <hr>
            <h1>Зарегистрироваться</h1>
            <form method="post" action="./backend/registration.php">

                <div class="form-outline mb-4">
                    <input type="text" id="registerUsername" name="username" class="form-control" />
                    <label class="form-label" for="registerUsername">New username</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="email" id="registerUsername" name="email" class="form-control" />
                    <label class="form-label" for="registerUsername">Email</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="registerPassword" name="password" class="form-control" />
                    <label class="form-label" for="registerPassword">Create password</label>
                </div>

                <input type="text" name="type" value="reg" style="display: none;">
                <button type="submit" class="btn btn-dark btn-block mb-3">Зарегистрироваться</button>
            </form>
        </div>
    </section>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

</body>

</html>