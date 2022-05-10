<?php
require __DIR__ . '/tasks.php';

$errors = [
    'text' => ''
];

if (!isset($_POST['id']) && !isset($_POST['action'])) {
    include __DIR__ . '/../partials/not_found.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task['text'] = $_POST['text'];
    $id = $_POST['id'];

    $isValid = validateTask($task, $errors);

    if ($isValid) {
        $task = updateTask($id, $task);
        header("Location: ../index.php");
    } else {
        $getParams = json_encode($errors);
        header("Location: ../index.php?errors=" . urlencode($getParams));
    }

    exit;
}


