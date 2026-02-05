<?php

function saveMessageInJSON($message_name, $message_text){
    //file path
    $file_path = 'data/messages.json';


    //get file data
    $current_data = file_get_contents($file_path);

    //convert json to array
     $messages = json_decode($current_data, true);

     $messages = $messages ?? [];

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
    file_put_contents($file_path, $json_data);

    return $new_message;
}

?>