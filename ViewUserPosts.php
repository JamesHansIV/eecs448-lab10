<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h4>User List</h4>
<?php

/* get userid from post */ 
$userid = $_POST["user-id"];
$mysqli = new mysqli("mysql.eecs.ku.edu","j729h566","weifie3y","j729h566");

/* Check connection */
if($mysqli->connect_errno) {
    printf("Connect fialed: %s\n", $mysqli->connect_error);
    exit();
}

/*define query*/
$query = "SELECT content FROM Posts WHERE author_id = '$userid'";
$result = mysqli_query($mysqli,$query);
if($result) {
    echo "<table style='border'><tr><th>".$userid."'s Posts</th>";
    if(mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row['content'] . "</td></tr>";
        }
    }
    echo "</table>";
} else {
    echo "Error!";
}


/*Go back links*/
echo "<br><br><a href='https://people.eecs.ku.edu/~j729h566/eecs448_lab10/UserPosts.php'>Select a different user</a><br>";
echo "<a href='https://people.eecs.ku.edu/~j729h566/index.html'>Home</a>";

?>
</body>
</html>