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
        <link rel="stylesheet" type="text/css" href="css\messages.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <p hidden id="usernames"><?php echo $username1; ?>, <?php echo $username2; ?></p>
    <!--Navigation-->
    <!--Logo left to go back to home.php-->
    <nav>
        <a href="home.php" id="logo"><img src="images/logo/logo_dark.png" alt="Logo" class="logo"></a>
        
        <form method="POST" action="profile.php">
            <input type="hidden" name="userID" value="<?php echo $_SESSION['id']; ?>">
            <img src= <?php echo $_SESSION["profilePicture"]; ?> alt="Profile picture" class="profile-picture" onclick="this.parentNode.submit();">
        </form>
    </nav>
    <p hidden id="user1"><?php echo $user1; ?></p>
    <p hidden id="user2"><?php echo $user2; ?></p>
    <h1 id="title">Your messages with <?php echo $username2; ?></h1>
    <div class="main">
        <div class="row" id="messages-row">
            <!-- Messages -->
            <div class="col-12 col-md-8 messages" id="messages-container">
                <!-- Messages will be displayed here using JavaScript -->
            </div>
            <!-- Send message -->
        </div>
        <div class="row" id="send-message-row">
            <div class="col-12 col-md-4">
                <form id="message-form">
                    <input type="hidden" name="user1" value="<?php echo $user1; ?>">
                    <input type="hidden" name="user2" value="<?php echo $user2; ?>">
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Type your message here..."></textarea>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="js\message.js"></script>
</body>
</html>