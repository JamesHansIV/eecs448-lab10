<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>User Posts</h4>
    <form action="ViewUserPosts.php" method="post">
        <?php
            $mysqli = new mysqli("mysql.eecs.ku.edu","j729h566","weifie3y","j729h566");
        
            /* Check connection */
            if(mysqli_connect_errno()) {
                printf("Connect fialed: %s\n", $mysqli->connect_error);
                exit();
            }

            $query = "SELECT * FROM Users";

            if($result = mysqli_query($mysqli,$query)) {
                echo "<label for='user-select'>Choose a user: </label>";
                echo "<select name='user-id' id='user-select'>";
                
                while($row = mysqli_fetch_array($result)) {
                    $id = $row['user_id'];
                    echo "<option value=$id>".$id."</option>";
                }
                echo "</select><br><br>";
            }
        ?>

        <input type="submit" value="Submit">    

    </form>
</body>
</html>