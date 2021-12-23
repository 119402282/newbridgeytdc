<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../classes/Post.php';
    include_once '../classes/Database.php';

    $database = new Database();
    $db = $database->connect();
    $post = new Post($db);
    $post->table = 'survey';

    // $_GET['']
    $data = json_decode(file_get_contents('php://input'));
    $post->phone = $data['phone'];
    $post->fullname = $data['fullname'];
    if($post->delete()){
        echo json_encode(['message'=> 'Data successfully deleted']);
    }else{
        echo json_encode(['message'=> 'Failed to delete record. Please email cullenhenry2016@gmail.com to request manual data deletion.']);
    };
?>