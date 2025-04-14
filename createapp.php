<?php
include 'connectdb.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if the user is not logged in
    header("Location: authorization.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $address = $_POST['Address'];
    $contact = $_POST['Contact'];
    $date = $_POST['Date'];
    $time = $_POST['Time'];
    $serviceform = $_POST['Serviceform'];
    $payment_type = $_POST['Payment_type'];
    $Id_user = $_SESSION['user_id'];
    // Вставляем данные в базу данных
    $query = "INSERT INTO Applications (Id_user, Address, Contact, Date, Time, Id_sevice, Payment_type) 
              VALUES('$Id_user', '$address', '$contact', '$date', '$time', '$serviceform', '$payment_type')";

    $mysqli->query($query);
    header("Location: application.php");
    //$stmt = $mysqli->prepare($query);
    // $stmt->bind_param("issssss", $user_id, $address, $contact, $date, $time, $service, $payment_type);

    // if ($stmt->execute()) {
    //     $success_message = "Заявка успешно создана!";
    // } else {
    //     $error_message = "Ошибка при создании заявки.";
    // }
    }
    $services = $mysqli->query("SELECT * FROM Services");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Формирование заявки</title>
</head>
<body>
    <h1>Формирование заявки</h1>

    <?php if (isset($success_message)): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php endif; ?>

    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="address">Адрес:</label><br>
        <input type="text" id="address" name="Address" required><br><br>

        <label for="contact">Контактные данные:</label><br>
        <input type="text" id="contact" name="Contact" required><br><br>

        <label for="date">Желаемая дата:</label><br>
        <input type="date" id="date" name="Date" required><br><br>

        <label for="time">Желаемое время:</label><br>
        <input type="time" id="time" name="Time" required><br><br>

        <label for="service">Вид услуги:</label><br>
        <select id="serviceform" name="Serviceform" required>
            <?php foreach ($services as $service){
                echo $service['Id']; ?>
                <option value="<?php echo $service['Id']; ?>">
                    <?php echo htmlspecialchars($service['Service_name']); ?>
                </option>
            <?php }; ?>
        </select><br><br>

        <label for="payment_type">Тип оплаты:</label><br>
        <select id="payment_type" name="Payment_type" required>
            <option value="Наличные">Наличные</option>
            <option value="Банковская карта">Банковская карта</option>
        </select><br><br>

        <button type="submit">Создать заявку</button>
    </form>
    <a href="application.php">Вернуться к списку заявок</a>
</body>
</html>