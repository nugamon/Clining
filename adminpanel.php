<?php
include 'connectdb.php';
session_start();

// Проверка прав администратора
if ($_SESSION['is_admin'] == false) {
    header('Location: authorization.php');
    exit();
}

// Обновление заявки
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $update_id = intval($_POST['update_id']); // Убедитесь, что ID - целое число
    $status = $_POST['Status'];
    $comment = $_POST['Comment'];

    // Убедимся, что данные для обновления корректны
    if (!empty($status) && !empty($update_id)) {
        $update_query = "UPDATE Applications SET Status = ?, Comment = ? WHERE Id = ?";
        $stmt = $mysqli->prepare($update_query);

        if ($stmt) {
            $stmt->bind_param("ssi", $status, $comment, $update_id);
            if ($stmt->execute()) {
                echo "Запись успешно обновлена!";
            } else {
                echo "Ошибка выполнения запроса: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Ошибка подготовки запроса: " . $mysqli->error;
        }
    } else {
        echo "Некорректные данные для обновления!";
    }
}

// Удаление заявки
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']); // Убедитесь, что ID - целое число
    $delete_query = "DELETE FROM Applications WHERE Id = ?";
    $stmt = $mysqli->prepare($delete_query);

    if ($stmt) {
        $stmt->bind_param("i", $delete_id);
        if ($stmt->execute()) {
            echo "Запись успешно удалена!";
            header("Location: adminpanel.php");
            exit();
        } else {
            echo "Ошибка выполнения запроса: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Ошибка подготовки запроса: " . $mysqli->error;
    }
}

// Получение всех заявок
$query = "SELECT Applications.Id, Users.Name, Applications.Address,  Applications.Contact, Applications.Date, Applications.Time, 
          Services.Service_name, Applications.Payment_type, Applications.Status, Applications.Comment 
          FROM Applications 
          LEFT JOIN Users ON Applications.Id_user = Users.Id 
          LEFT JOIN Services ON Applications.Id_sevice = Services.Id";

$result = $mysqli->query($query);

if (!$result) {
    die("Ошибка выполнения запроса: " . $mysqli->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Администратор</title>
</head>
<body>
    <h1>Администратор - Управление заявками</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Адрес</th>
                    <th>Контакт</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Услуга</th>
                    <th>Тип оплаты</th>
                    <th>Статус</th>
                    <th>Комментарий</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Name']); ?></td>
                        <td><?php echo htmlspecialchars($row['Address']); ?></td>
                        <td><?php echo htmlspecialchars($row['Contact']); ?></td>
                        <td><?php echo htmlspecialchars($row['Date']); ?></td>
                        <td><?php echo htmlspecialchars($row['Time']); ?></td>
                        <td><?php echo htmlspecialchars($row['Service_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['Payment_type']); ?></td>
                        <td><?php echo htmlspecialchars($row['Status']); ?></td>
                        <td><?php echo htmlspecialchars($row['Comment']); ?></td>
                        <td>
                            <!-- Форма для редактирования -->
                            <form action="" method="POST">
                                <input type="hidden" name="update_id" value="<?php echo htmlspecialchars($row['Id']); ?>">
                                <select name="Status" required>
                                    <option value="В работе" <?php if ($row['Status'] == 'В работе') echo 'selected'; ?>>В работе</option>
                                    <option value="Готово" <?php if ($row['Status'] == 'Готово') echo 'selected'; ?>>Готово</option>
                                    <option value="Отказ" <?php if ($row['Status'] == 'Отказ') echo 'selected'; ?>>Отказ</option>
                                </select>
                                <input type="text" name="Comment" value="<?php echo htmlspecialchars($row['Comment']); ?>" placeholder="Комментарий">
                                <button type="submit">Сохранить</button>
                            </form>

                            <!-- Удаление заявки -->
                            <form action="" method="GET" onsubmit="return confirm('Вы уверены, что хотите удалить эту заявку?');">
                                <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($row['Id']); ?>">
                                <button type="submit" style="background-color: red; color: white;">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Заявок нет.</p>
    <?php endif; ?>

    <a href="destroysession.php">Выйти</a>
</body>
</html>