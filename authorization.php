<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php 
        include 'connectdb.php';
        session_start();
    ?>

    <?php 
        // $_SESSION['user_id'] = 10;
        // echo $_SESSION['user_id'];
        // if ($_SESSION['is_admin'] == true) {
        //     header('Location: adminpanel.php');
        // }
        if(isset($_SESSION['user_id'])) {
            header('Location: application.php');
        }
    ?>
    
    <section class="main-container">
        <h1>Авторизация</h1>
        <form action="auth.php" method="post" class="form">
            <input class="form-input" type="text" name="login" placeholder="Логин" required>
            <input class="form-input" type="password" name="password" placeholder="Пароль" required>
            <button class="form-button" type="submit">Войти</button>
        </form>
        <a class="auth-reg-link" href="index.php">Если у вас нет учётной записи.<br>Зарегистрироваться</a>
    </section>

</body>
</html>