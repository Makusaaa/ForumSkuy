<?php
    // TODO: Login
    // TODO: Register
    // TODO: Logout
    session_start();
    require_once "./connection.php";

    if(isset($_POST["login"])){
        try{
            $username = $_POST["username"];
            $password = $_POST["password"];

            // cara1
                // $querySelectUser = "SELECT * FROM users where username = '" . $username ."' and password = '" . $password . "'";
                $querySelectUser = "SELECT * FROM users where username = '$username' and password = '$password'";
                // $querySelectUser = "SELECT * FROM users where username = '$username'";
                // print_r($querySelectUser);
                // exit();

                $result = $db->query($querySelectUser);
                // var_dump($result);

                // if($result->num_rows == 1){
                if($result->num_rows){
                    while($row = $result->fetch_object()){
                        var_dump($row);
                        $_SESSION["isLogin"] = true;
                        $_SESSION["username"] = $row->username;
                        $_SESSION["picture"] = $row->picture;
                        $_SESSION["id"] = $row->id;
                        header("location: ../index.php");
                        exit();
                    }
                }
            
            // // cara2
            //     $querySelectUser = "SELECT * FROM users where username = ? and password = ?";
            //     $result = $db->prepare($querySelectUser);
            //     $result->bind_param("ss", $username, $password);

            //     $result->execute();
            //     // var_dump($result);
            //     // $results = $result->get_result();
            //     $results = $result->get_result();
            //     // var_dump($results);
            //     // exit();
            //     if($results->num_rows == 1){
            //         while($row = $results->fetch_object()){
            //             // var_dump($row);
            //             $_SESSION["isLogin"] = true;
            //             $_SESSION["username"] = $row->username;
            //             $_SESSION["picture"] = $row->picture;
            //             $_SESSION["id"] = $row->id;
            //             header("location: ../index.php");
            //             exit();
            //         }
            //     }
            
            $error = "invalid username or password";
            $_SESSION["username-input"] = $username;
            $_SESSION["password-input"] = $password;
            $_SESSION["error-message"] = $error;
            header("location: ../login.php");
        }
        catch(Exception $e){
            var_dump($e);
            echo "exception: " . $e->getMessage();
        }
    }else if(isset($_GET["logout"])){
        var_dump($_SESSION);
        $_SESSION = array();
        session_destroy();
        header("location: ../login.php");
    }


?>