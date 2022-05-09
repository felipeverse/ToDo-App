<?php
require __DIR__ . '/tasks.php';

if (!isset($_POST['id'])) {
    include __DIR__ . '/../partials/not_found.php';
    exit;
}

$taskId = $_POST['id'];

changeTaskStatus($taskId);

header('Location: ../index.php');

