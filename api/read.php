<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../classes/Post.php';

    include_once '../classes/Database.php';

    $database = new Database();
    $db = $database->connect();

    $post = new Post($db);
    $post->table = 'survey';


?>