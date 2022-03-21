<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/x-www-form-urlencoded');

    include_once '../classes/Post.php';
    include_once '../classes/Database.php';

    $database = new Database();
    $db = $database->connect();

    $post = new Post($db);

    session_start();

    if(isset($_SESSION['skuser'])){
        if($_SESSION["skuser"]==="admin"){
            $result = $post->read();
            $num_rows = $result->rowCount();

            if($num_rows>0){
                $post_arr = array();
                $post_arr['data'] = array();

                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $post_item = [
                        'phone' => $phone,
                        'full_name' => $full_name
                    ];

                    array_push($post_arr['data'], $post_item);
                }

                // echo json_encode($post_arr);
                echo json_encode([
                    'message' => 'Login failed!' . ($_SESSION["skuser"] || 'empty')
                ]);
        
            } else {

                echo json_encode([
                    'message' => 'No posts found!'
                ]);

            }
        }
    } elseif($_POST["username"] === "n580414" && $_POST["password"] === "OUj10-A5;Q3ufc"){
        $result = $post->read();
        $_SESSION["skuser"]="admin";
        $num_rows = $result->rowCount();

        if($num_rows>0){
            $post_arr = array();
            $post_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $post_item = [
                    'phone' => $phone,
                    'full_name' => $full_name
                ];

                array_push($post_arr['data'], $post_item);
            }

            // echo json_encode($post_arr);
            echo json_encode([
                'message' => 'Login failed!' . ($_SESSION["skuser"] || 'empty')
            ]);

        } else {

            echo json_encode([
                'message' => 'No posts found!'
            ]);

        }
    } else {

        echo json_encode([
            'message' => 'Login failed!' . ($_SESSION["skuser"] || 'empty')
        ]);
        
    }
?>