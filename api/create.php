<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/x-www-form-urlencoded');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../classes/Post.php';
    include_once '../classes/Database.php';

    $database = new Database();
    $db = $database->connect();
    $post = new Post($db);
    $post->table = 'survey';

    $post->phone = $_POST['phone'];
    $post->full_name = $_POST['fullname'];
    if($post->create()){
        echo json_encode(['message'=> 'Great your survey has been submitted successfully!']);
    }else{
        echo json_encode(['message'=> 'Submission failed. Please try again later.']);
    };
?>