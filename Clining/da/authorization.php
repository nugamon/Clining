<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Авторизация</title>
</head>
<body>

    <?php
        include 'connectdb.php';
        session_start();
    ?> 
    <?php 
        // $_SESSION['User_id'] = 10;
        echo $_SESSION['User_id'];

        if($_SESSION['User_id']) {
            header(header: 'Location: application.php');
        }
    ?>

    <h1>Авторизация</h1>
    <form method="post" action="auth.php">
        <label for="login">Логин:</label>
        <input type="text" id="login" name="login">
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" autocomplete="off"> 
        <button type="submit">Вход</button>
    </form>
    <a href="index.php">Чтобы зарегистрироваться, нажмите здесь</a>
</body>
</html>