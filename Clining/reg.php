<?php
    include 'connectdb.php';
    session_start();
?>

<?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "INSERT INTO Users (Name, Phone, Email, Login, Password)
    VALUES('$name', '$phone', '$email', '$login', '$password')";

    $mysqli->query(query: $query);

    if ($mysqli->error) {
        echo "<script> alert('Не удалось зарегистрироваться')</script>";
        header (header: "Location: ../index.php");
    }
    else {
        header (header: "Location: ../application.php");
    }
?>