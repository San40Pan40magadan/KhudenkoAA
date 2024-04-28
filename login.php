<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Худенко А.А.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<main>
    <div class="login">
        <h1>Вход</h1>
        <div class="login_form">
            <div class="col-12">
                <form method="POST" action="/login.php">
                    <div class="form_reg"><input type="text" class="form"  name="username" placeholder="Login"></div>
                    <div class="form_reg"><input type="password" class="form"  name="password" placeholder="Password"></div>
                    <button class="btn_reg" type="submit" name="submit">Продолжить</button>
                </form>
            </div>
        </div>
    </div>
</main> 
</body>
</html>


<?php
#    require_once('db.php');

    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');
    
    if (isset($_COOKIE['User'])) {
        header("Location: profile.php");
    }
    
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $pass = $_POST['password'];

        if (!$username || !$pass) die ('Пожалуйста введите все значения!');

        $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";

        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) == 1) {
            setcookie("User", $username, time()+7200);
            header('Location: profile.php');
        } else {
            echo "не правильное имя или пароль";
        }

        if(!mysqli_query($link, $sql)) {
            echo "Не удалось найти пользователя";
        }
}
?>