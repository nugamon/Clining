<?php
include 'connectdb.php';
session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: authorization.php");
    exit();
}

// Dynamically get the user ID from the session
$user_id = $_SESSION['user_id'];

$query = "SELECT Applications.*, Services.Service_name FROM Applications INNER JOIN Services ON Applications.Id_sevice = Services.Id WHERE Id_user = ". $user_id ."";
$stmt = $mysqli->prepare($query);
//$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Мои заявки</title>
</head>
<body>
    <h1>Ваши заявки</h1>
    <?php
    if ($_SESSION['is_admin'] == true) {
        header('Location: adminpanel.php');
    }
    ?>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Услуга</th>
                    <th>Адрес</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Статус</th>
                    <th>Тип оплаты</th>
                    <th>Комментарий</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Service_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['Address']); ?></td>
                        <td><?php echo htmlspecialchars($row['Date']); ?></td>
                        <td><?php echo htmlspecialchars($row['Time']); ?></td>
                        <td><?php echo htmlspecialchars($row['Status']); ?></td>
                        <td><?php echo htmlspecialchars($row['Payment_type']); ?></td>
                        <td><?php echo htmlspecialchars($row['Comment']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>У вас нет заявок.</p>
    <?php endif; ?>

    <button><a href="destroysession.php">Выйти</a></button>
    <button><a href="createapp.php">Создать заявку</a></button>
</body>
</html>