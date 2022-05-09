<?php
require __DIR__ . '/tasks.php';

$task = [
    'text' => '',
    'completed' => false
];

$errors = [
    'text' => ''
];

$isValid = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = array_merge($task, $_POST);
    
    $isValid = validateTask($task, $errors);
    
    if ($isValid) {
        $task = createTask($task);
        header("Location: ../index.php");
    } else {
        $getParams = json_encode($errors);
        header("Location: ../index.php?errors=" . urlencode($getParams));
    }

    exit;
}
