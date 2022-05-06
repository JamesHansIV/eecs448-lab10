<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h4>Delete Posts</h4>
<form action="DeletePost.php" method="post">
<?php

$mysqli = new mysqli("mysql.eecs.ku.edu","j729h566","weifie3y","j729h566");

/* Check connection */
if($mysqli->connect_errno) {
    printf("Connect fialed: %s\n", $mysqli->connect_error);
    exit();
}

/*define query*/
$query = "SELECT * FROM Posts";
$result = mysqli_query($mysqli,$query);
if($result) {
    echo "<table style='border'><tr><th>Author</th><th>Post</th><th>Delete?</th>";
    if(mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            $postid = $row['post_id'];
            echo "<p>POST: $postid</p>";
            echo "<tr><td>". $row['author_id'] . "</td>
                      <td>". $row['content'] . "</td>
                      <td><input type='checkbox' name='checkbox[]' value='$postid'></td></tr>";
        }
    }
    echo "</table><br><br>";
    echo "<input type='submit' value='Delete'>";

} else {
    echo "Error!";
}
?>
</form>
</body>
</html>