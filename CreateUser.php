<?php 

    /* Get Post data */
    $userid = $_POST["user-id"];

    if($userid == "") {
        echo "user id cannot be empty<br>";
    } else {
        $mysqli = new mysqli("mysql.eecs.ku.edu","j729h566","weifie3y","j729h566");

        /* Check connection */
        if($mysqli->connect_errno) {
            printf("Connect fialed: %s\n", $mysqli->connect_error);
            exit();
        }

        /* Define query */
        $query = "INSERT INTO Users(user_id) VALUES ('$userid')";

        if(mysqli_query($mysqli,$query)) {
            echo "User Created!";
        } else {
            echo "ERROR: SQL: $query failed.<br>"; 
            echo  mysqli_error($mysqli) . "<br>";

        }

        $mysqli->close();
    }

    

    /*Go back links*/
    echo "<br><br><a href='https://people.eecs.ku.edu/~j729h566/eecs448_lab10/CreateUser.html'>Create another user</a><br>";
    echo "<a href='https://people.eecs.ku.edu/~j729h566/index.html'>Home</a>";
?>