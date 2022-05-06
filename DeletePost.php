<?php 

    /* Get Post data */
    $mysqli = new mysqli("mysql.eecs.ku.edu","j729h566","weifie3y","j729h566");

    /* Check connection */
    if($mysqli->connect_errno) {
        printf("Connect fialed: %s\n", $mysqli->connect_error);
        exit();
    }
    //loop through each checked post and delete it
    foreach ($_POST['checkbox'] as $postid) {
        echo"Hello";
        $query = "DELETE FROM Posts WHERE post_id = '$postid'";
        if($result = $mysqli->query($query)) {
            echo "<p>Deleted Post: ".$postid."</p><br>"; //success
        } else {
            echo "<p>Delete Failed: $postid</p><br>";   //fail
        }
    }    

    /*Go back links*/
    echo "<br><br><a href='https://people.eecs.ku.edu/~j729h566/eecs448_lab10/DeletePostFront.php'>Delete another post</a><br>";
    echo "<a href='https://people.eecs.ku.edu/~j729h566/index.html'>Home</a>";
?>