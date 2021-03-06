<?php

    ini_set("include_path", '/home/n580414/php:' . ini_get("include_path") );

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/x-www-form-urlencoded');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../classes/Post.php';
    include_once '../classes/Database.php';

    $database = new Database();
    $db = $database->connect();
    $post = new Post($db);

    $post->phone = $_POST['phone'];
    $post->full_name = $_POST['fullname'];
    if($post->create()){
        echo json_encode(['message'=> 'Thank you '. explode(' ', trim($post->full_name))[0].', your survey has been submitted successfully!']);
    }else{
        echo json_encode(['message'=> 'Submission failed. Please try again later. Or contact our email: youthbridge2016@gmail.com']);
    };
?>