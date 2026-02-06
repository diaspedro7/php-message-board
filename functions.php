<?php

//file path
const FILE_PATH = 'data/messages.json';

function saveMessageInJSON($message_name, $message_text){
    

    $messages = loadJSONData();

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
    file_put_contents(FILE_PATH, $json_data);

    return $new_message;
}


function loadJSONData(){


    //get file data
    $current_data = file_get_contents(FILE_PATH);

    //convert json to array
     $messages_array = json_decode($current_data, true);

     $messages_array = $messages_array ?? [];

     return $messages_array;
}

?>