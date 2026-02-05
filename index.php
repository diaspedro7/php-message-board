<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message_name = $_POST['message_name'];
    $message_text = $_POST['message_text'];

    //file path
    $filePath = 'data/messages.json';


    //get file data
    $current_data = file_get_contents($filePath);

    //convert json to array
     $messages = json_decode($current_data, true);

    //create new message
    $new_message = [
        'name' => $message_name,
        'message' => $message_text
    ];

    //add new message to array of messages
    $messages[] = $new_message;

    //convert array to json
    $json_data = json_encode($messages, JSON_PRETTY_PRINT);

    //save json
    file_put_contents($filePath, $json_data);

    echo "Message saved successfully! <br>";

    echo "Name: ". $new_message['name']. "<br>";
    echo "Text: ". $new_message['message'];
    


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