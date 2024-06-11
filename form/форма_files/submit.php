<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Проверка на валидность email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Неверный формат email";
    } else {
        // Сообщение
        $email_message = "Имя: " . $name . "\n";
        $email_message .= "Телефон: " . $phone . "\n";
        $email_message .= "Сообщение: " . $message . "\n";

        // Отправка email
        $to = 'standofffak16@gmail.com'; // Замените на ваш реальный email
        $subject = 'Новое сообщение с вашего сайта';
        $headers = 'From: ' . $email . "\r\n";
        $headers .= 'Reply-To: ' . $email . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $email_message, $headers)) {
            echo "Сообщение отправлено";
        } else {
            echo "Сообщение не может быть отправлено";
        }
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Email: <input type="email" name="email" required><br>
    Name: <input type="text" name="name" required><br>
    Phone: <input type="tel" name="phone" required><br>
    Message: <textarea name="message" required></textarea><br>
    <input type="submit" value="Отправить">
</form>
