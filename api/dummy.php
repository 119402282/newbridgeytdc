<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/x-www-form-urlencoded');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../classes/Post.php';
    include_once '../classes/Database.php';

    // $database = new Database();
    // $db = $database->connect();
    // $post = new Post($db);
    // $post->table = 'survey';

    // $post->phone = $_POST['phone'];
    // $post->full_name = $_POST['fullname'];
    
    // echo json_encode(['message'=> 'phone: '. $post->phone . '\n' . 'full_name: ' . $post->full_name . '\n']);
       echo json_encode(["message"=>"hello world"]);
?>