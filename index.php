<?php 

require 'functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message_name = $_POST['message_name'];
    $message_text = $_POST['message_text'];

    $saved_message = saveMessageInJSON($message_name, $message_text);
    
    echo "Message saved successfully! <br>";

    echo "Name: ". $saved_message['name']. "<br>";
    echo "Text: ". $saved_message['message'];

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Board</title>
</head>
<body>

<h1>Message Board</h1>

    <form action="index.php" method="POST">
        <label for="message_name">Your name:</label>
        <input type="text" id="message_name" name="message_name" required><br><br>

        <label for="message_text">Your message:</label>
        <input type="text" id="message_text" name="message_text" required><br><br>

        <button type="submit">Send message</button>
    </form>
</body>
</html>