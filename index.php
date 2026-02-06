<?php 

require 'functions.php';

//load data
$messages = loadJSONData();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message_name = $_POST['message_name'];
    $message_text = $_POST['message_text'];

    $saved_message = saveMessageInJSON($message_name, $message_text);

    $messages = loadJSONData();

    //redirect
    header('Location: index.php');
    exit;
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Board</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">

     <!-- LEFT SIDE -->
     <div class="left">
<h2>Send a message</h2>

    <form action="index.php" method="POST">
        <label for="message_name">Your name:</label>
        <input type="text" id="message_name" name="message_name" required><br><br>

        <label for="message_text">Your message:</label>
        <input type="text" id="message_text" name="message_text" required><br><br>

        <button type="submit">Send message</button>
    </form>
    </div>

    <!-- RIGHT SIDE -->
    <div class="right">
        <h2>Messages</h2>

        <?php if (empty($messages)): ?>
        <p>No messages yet.</p>
    <?php else: ?>
        <?php foreach ($messages as $msg): ?>
            <div class="message-card">
                <div class="message-name">
                    <?= htmlspecialchars($msg['name']) ?>
                </div>
                <div class="message-text">
                    <?= htmlspecialchars($msg['message']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>

    

</div>

</body>
</html>