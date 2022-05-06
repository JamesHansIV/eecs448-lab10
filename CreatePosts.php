<?php 

    /* Get Post data */
    $userid = $_POST["user-id"];
    $content = $_POST["content"];


    /*Check if the content is not empty*/
    if($content != "") {
        $mysqli = new mysqli("mysql.eecs.ku.edu","j729h566","weifie3y","j729h566");

        /* Check connection */
        if($mysqli->connect_errno) {
            printf("Connect fialed: %s\n", $mysqli->connect_error);
            exit();
        }

        /*Check if the user exists */
        $user_id_query = "select * from Users where user_id like '%$userid%'";
        $result = mysqli_query($mysqli,$user_id_query);
        if($result) {
            if(mysqli_num_rows($result) > 0) {
                
                /* attempt to save post */
                $content_query = "INSERT INTO Posts(content, author_id) VALUES ('$content','$userid')";

                if(mysqli_query($mysqli,$content_query)) {
                    echo "Post Created!";
                } else {
                    echo "ERROR: SQL: $content_query failed.<br>"; 
                    echo  mysqli_error($mysqli) . "<br>";
                }

            } else {
                echo "Post Creation failed! User $userid does not exist.<br>";
            }
        } else {
            echo "ERROR: SQL: $user_id_query failed.<br>"; 
            echo  mysqli_error($mysqli) . "<br>";
        }

        $mysqli->close();
    } else {
        echo "Post not saved because post content was empty!<br><br>";
    }

    

    /*Go back links*/
    echo "<br><br><a href='https://people.eecs.ku.edu/~j729h566/eecs448_lab10/CreatePosts.html'>Create another Post</a><br>";
    echo "<a href='https://people.eecs.ku.edu/~j729h566/index.html'>Home</a>";
?>