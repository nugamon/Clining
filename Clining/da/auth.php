<?php
    include 'connectdb.php';
    session_start();
?>

<?php
    $result = $mysqli->query(query: 'SELECT * FROM Users WHERE Login="'.$_POST['login'].'" AND Password="'.$_POST['password'].'"');
    $_SESSION['is_admin'] = false;
    $_SESSION['User_id'] = 10;
    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (($_POST['login'] == 'adminka') && ($_POST['password'] == 'password')) {
            $_SESSION['is_admin'] = true;
            header(header: 'Location: adminpanel.php');
        }
        header(header: 'Location: application.php');
    } else {
        header(header: 'Location: authorization.php');
    }
?>