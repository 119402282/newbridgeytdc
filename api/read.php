<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/x-www-form-urlencoded');

    include_once '../classes/Post.php';
    include_once '../classes/Database.php';

    $database = new Database();
    $db = $database->connect();

    $post = new Post($db);

    if($_POST["user"] === "n580414" && $_POST["pass"] === "OUj10-A5;Q3ufc"){
        $result = $post->read();

        $num_rows = $result->rowCount();
        $post_arr = array();

        if($num_rows>0){
            $post_arr['data'] = array();
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $post_item = [
                    'phone' => $phone,
                    'full_name' => $full_name
                ];
                array_push($post_arr['data'], $post_item);
            }

            echo json_encode($post_arr);
        } else {
            echo json_encode([
                'message' => 'No posts found!'
            ]);

        }
    } else {
        echo json_encode([
            'message' => 'Login failed!'
        ]);
    }
?>