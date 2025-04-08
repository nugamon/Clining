<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Регистрация</title>
</head>
<body>
    <?php
        include 'connectdb.php';
        session_start();
    ?>

    <h1>Регистрация</h1>

    <form action="reg.php" method="POST">
        <label>ФИО</label>
        <input type="text" name="name" required>
        <label>Телефон</label>
        <input type="phone" name="phone" required>
        <label>Электронная почта</label>
        <input type="email" name="email" required>
        <label>Логин</label>
        <input type="text" name="login" required>
        <label>Пароль</label>
        <input type="password" name="password" required>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <a href="authorization.php">Войти в существующий аккаунт</a>  
</body>
</html>