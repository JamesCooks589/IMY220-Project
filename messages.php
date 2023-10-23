<?php 
    session_start();
    include_once "db_connection.php";

    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    //2 users sent in the url user1=1&user2=2
    $user1 = $_GET['user1'];
    $user2 = $_GET['user2'];

    //Get the names of the users
    $sql = "SELECT * FROM users WHERE id = '$user1'";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($query);
    $username1 = $row['username'];

    $sql = "SELECT * FROM users WHERE id = '$user2'";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($query);
    $username2 = $row['username'];

    function getAndDisplayMessages($user1, $user2, $mysqli){
        $sql = "SELECT * FROM messages WHERE (user1 = '$user1' AND user2 = '$user2') OR (user1 = '$user2' AND user2 = '$user1') ORDER BY id ASC";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_assoc($query)){
            $user1 = $row['user1'];
            $user2 = $row['user2'];
            $message = $row['message'];
            $date = $row['date'];
            $time = $row['time'];

            //Get the username of the user who sent the message
            $sql2 = "SELECT * FROM users WHERE id = '$user1'";
            $query2 = mysqli_query($mysqli, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            $username = $row2['username'];

            //Display the message
            echo "<div class='message'>";
            echo "<p class='message-content'>$message</p>";
            echo "<p class='message-info'>$username, $date, $time</p>";
            echo "</div>";
        }
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="James Cooks">
    <title>Messages between <?php echo $username1; ?> and <?php echo $username2 ?></title>

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!--Fonts-->
        <!--EXO2-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
        <!--Raleway-->
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Messages between <?php echo $username1; ?> and <?php echo $username2; ?></a>
          <div class="d-flex">
            <a href="logout.php" class="btn btn-danger">Logout</a>
          </div>
        </div>
      </nav>
    <h1>Your messages with <?php echo $username2; ?></h1>
    <div class="fluid-container">
        <div class="row">
            <!--Messages-->
            <div class="col-12 col-md-8 messages">
                <?php getAndDisplayMessages($user1, $user2, $mysqli); ?>
            </div>
            <!--Send message-->
            <div class="col-12 col-md-4">
                <form action="send_message.php" method="post">
                    <input type="hidden" name="user1" value="<?php echo $user1; ?>">
                    <input type="hidden" name="user2" value="<?php echo $user2; ?>">
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Type your message here..."></textarea>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>