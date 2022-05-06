<?php

$todoName = trim($_POST['todo_name'] ?? false);

if ($todoName) {
    if (file_exists("todo.json")) {
        $jsonArray = json_decode($json = file_get_contents('todo.json'), true);
    } else {
        $jsonArray = [];
    }

    $jsonArray[$todoName] = ['completed' => false];
    file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('Location: index.php');