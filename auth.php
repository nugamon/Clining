<?php 
    include 'connectdb.php';
    session_start();
?>

<?php 
    $result = $mysqli->query('SELECT * FROM Users WHERE Login="'.$_POST['login'].'" AND Password="'.$_POST['password'].'"');
    $_SESSION['is_admin'] = false;
    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['Id'];
        if (($_POST['login'] == 'adminka') && ($_POST['password'] == 'password')) {
            $_SESSION['is_admin'] = true;
            header('Location: adminpanel.php');
        }
        header('Location: application.php');
    } else {
        header('Location: authorization.php');
    }
?>

