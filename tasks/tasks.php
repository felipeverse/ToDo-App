<?php

function getTasks()
{   
    if (file_exists(__DIR__ . '/tasks.json')) {
        $json = json_decode(file_get_contents(__DIR__ . '/tasks.json'), true);
        return $json['tasks'];
    } else {
        $json['lastId'] = 0;
        $json['tasks']  = [];
        putJson($json);
        return $json['tasks'];
    }
}

function getJson()
{
    if (file_exists(__DIR__ . '/tasks.json')) {
        $json = json_decode(file_get_contents(__DIR__ . '/tasks.json'), true);
        return $json;
    } else {
        $json['lastId'] = 0;
        $json['tasks']  = [];
        putJson($json);
        return $json;
    }
}

function getTaskById($id)
{
    $tasks = getTasks();
    return $tasks[$id];
}

function createTask($newTask)
{
    $tasks = getTasks();
    $tasks[getLastId() + 1] = $newTask;
    $json['lastId'] = getLastId() + 1;
    $json['tasks'] = $tasks;
    
    putJson($json);

    return $newTask;
}

function deleteTask($id)
{
    checkId($id);
   
    $tasks = getTasks();
    unset($tasks[$id]);
    
    $json = getJson();
    $json['tasks'] = $tasks;

    putJson($json);
}

function updateTask($id, $task)
{
    checkId($id);

    $tasks = getTasks();
    $tasks[$id] = $task;

    $json = getJson();
    $json['tasks'] = $tasks;

    putJson($json);
}

function changeTaskStatus($id) 
{
    checkId($id);
    
    $tasks = getTasks();
    $tasks[$id]['completed'] = !$tasks[$id]['completed'];

    $json = getJson();
    $json['tasks'] = $tasks;

    putJson($json);
}

function putJson($json) 
{
    file_put_contents(__DIR__ . "/tasks.json", json_encode($json, JSON_PRETTY_PRINT));
}

function validateTask($task, &$errors)
{
    $isValid = true;

    if(!$task['text'] || strlen($task['text']) < 5) {
        $isValid = false;
        $errors['text'] = 'ToDo text is required and it must be more than 4 characters.';
    }

    return $isValid;
}

function getLastId()
{
    $json = json_decode(file_get_contents(__DIR__ . '/tasks.json'), true);
    return $json['lastId'];
}

function checkId($id)
{
    if (!getTaskById($id)) {
        include __DIR__ . '/../partials/not_found.php';
        exit;
    }
}


function dd($data) 
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}