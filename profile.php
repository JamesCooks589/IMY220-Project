<?php  
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    $conn = mysqli_connect('localhost', 'root', '', 'wholeartedly');
    if(!$conn){
        die("Error connecting to database: " . mysqli_connect_error());
    }

    $userID = $_POST['userID'];
    //All sql queries for sections on profile page
    $sql = "SELECT * FROM users WHERE id = '$userID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql2 = "SELECT * FROM articles WHERE user_id = '$userID' ORDER BY 'date' DESC";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    $sql3 = "SELECT * FROM lists WHERE user_id = '$userID'";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($result3);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Profile</title>
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!--Line Icons-->
        <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
        <!--EXO2-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
        <!--Raleway-->
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <!-- CSS -->
        <link href="css/profile.css" rel="stylesheet">
        <!-- JS -->
        <!--Jquery-->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    </head>
    <body>
        <img src="images/starry_night.png" alt="Banner" class="img-fluid">
        <?php if($_SESSION['id'] == $userID){ 
                echo 'Hello ' . $_SESSION['username'] . '!';
            }else{
                echo 'Say hello to ' . $row['username'] . '!';
                //If user is not friends with the profile they are viewing, show add friend button or if they are friends, show remove friend button
                $friends = $row['friends'];
                $friendsArray = explode(',', $friends);
                if(!in_array($_SESSION['id'], $friendsArray)){
                    echo '<form action="" method="POST"><input type="hidden" name="userID" value="' . $userID . '"><button class="btn btn-primary" name="addFriend">Add Friend</button></form>';
                }else{
                    echo '<form action="" method="POST"><input type="hidden" name="userID" value="' . $userID . '"><button class="btn btn-primary" name="removeFriend">Remove Friend</button></form>';
                    //Message button
                    echo '<form action="messages.php" method="POST"><input type="hidden" name="userID" value="' . $userID . '"><button class="btn btn-primary" name="message">Message</button></form>';
                }
            }


        ?>
        <div class="container">
            <div class="row">
                <!--2 columns-->
                <!-- Left column for profile info-->
                <div class="col-md-4">
                    <h2>Profile Info</h2>
                    <div class="profileInfo">
                        <?php 
                            echo '<img src="' . $row['profilePicture'] . '" alt="Profile Picture" class="img-fluid">';
                            echo '<p>Username: ' . $row['username'] . '</p>';
                            echo '<p>Email: ' . $row['email'] . '</p>';
                            //If the userID and session id are the same, show edit profile button and other personal info
                            if($userID == $_SESSION['id']){
                                echo '<p>First Name: ' . $row['name'] . '</p>';
                                echo '<p>Last Name: ' . $row['surname'] . '</p>';
                                echo '<p>Date of Birth: ' . $row['dateOfBirth'] . '</p>';
                                
                                //toggle edit profile modal
                                echo '<button class="btn btn-primary" id="editProfile" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>';
                                echo '<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">';
                                echo '<div class="modal-dialog modal-dialog-centered">';
                                echo '<div class="modal-content">';
                                echo '<div class="modal-header">';
                                echo '<h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>';
                                echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                echo '</div>';
                                echo '<div class="modal-body">';
                                echo '<form action="" method="POST" enctype="multipart/form-data">';
                                echo '<div class="mb-3">';
                                echo '<label for="profilePicture" class="form-label">Profile Picture</label>';
                                echo '<input type="file" class="form-control" id="profilePicture" name="profilePicture">';
                                echo '</div>';
                                echo '<div class="mb-3">';
                                echo '<label for="name" class="form-label">First Name</label>';
                                echo '<input type="text" class="form-control" id="name" name="name" value="' . $row['name'] . '">';
                                echo '</div>';
                                echo '<div class="mb-3">';
                                echo '<label for="surname" class="form-label">Last Name</label>';
                                echo '<input type="text" class="form-control" id="surname" name="surname" value="' . $row['surname'] . '">';
                                echo '</div>';
                                echo '<div class="mb-3">';
                                echo '<label for="dateOfBirth" class="form-label">Date of Birth</label>';
                                echo '<input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="' . $row['dateOfBirth'] . '">';
                                echo '</div>';
                                echo '<div class="mb-3">';
                                echo '<label for="email" class="form-label">Email</label>';
                                echo '<input type="email" class="form-control" id="email" name="email" value="' . $row['email'] . '">';
                                echo '</div>';
                                echo '<div class="mb-3">';
                                echo '<label for="username" class="form-label">Username</label>';
                                echo '<input type="text" class="form-control" id="username" name="username" value="' . $row['username'] . '">';
                                echo '</div>';
                                echo '<div class="mb-3">';
                                echo '<label for="password" class="form-label">Password</label>';
                                echo '<input type="password" class="form-control" id="password" name="password" value="' . $row['password'] . '">';
                                echo '</div>';
                                echo '</div>';
                                echo '<button type="submit" class="btn btn-primary" name="editProfile">Submit</button>';
                                echo '</form>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';

                            }
                        ?>
                    </div>
                </div>
                <!--Right column for articles and lists-->
                <!--Only show lists if the userID and session id are the same-->
                <div class="col-md-8">
                    <?php 
                        //If the user is owner of profile display toggle button between lists and articles
                        if($userID == $_SESSION['id']){
                            echo '<div class="toggle">';
                            echo '<button class="btn btn-primary" id="articles">Articles</button>';
                            echo '<button class="btn btn-primary" id="lists">Lists</button>';
                            echo '</div>';
                        }
                        echo '<div class="bigArticles">';
                            echo '<h2>Articles by ' . $row['username'] . '</h2>';
                            echo '<div class="articles">';
                            //Loop through articles and display them
                            if(mysqli_num_rows($result2) > 0){
                                while($row2 = mysqli_fetch_assoc($result2)){
                                    //Explode and all caps hashtags
                                    $hashtags = explode(",", $row2["hashtags"]);
                                    $hashtags = array_map('strtoupper', $hashtags);
                                    echo "<div class='card mb-3 article'>";
                                        echo "<div class='row g-0'>";
                                        echo "<div class='col-md-4'>";
                                        echo "<img src='".$row2["artPieceImage"]."' alt='No Image' class='img-fluid'>";
                                        echo "</div>";
                                        echo "<div class='col-md-8'>";
                                        echo "<div class='card-body'>";
                                        echo "<div class='category'>";
                                        echo "<span class='badge bg-primary'>".$row2["category"]."</span>";
                                        echo "</div>";
                                        echo "<h5 class='card-title title'>".$row2["title"]."</h5>";
                                        echo "<h6 class='card-subtitle mb-2 '>".$row2["author"]."</h6>";
                                        echo "<h6 class='card-subtitle mb-2 '>".$row2["date"]."</h6>";
                                        //Hidden element for id
                                        echo "<p class='card-text id' hidden>".$row2["article_id"]."</p>";
                                        
                                        echo "<p class='card-text'>".$row2["summary"]."</p>";
                                        echo "<div class='hashtags'>";
                                        foreach($hashtags as $hashtag){
                                        echo "<span class='badge hashtag'>".$hashtag."</span>";
                                        }
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                                //^end of bigArticles div
                                
                                
                            }
                        }else{
                            echo '<p>No articles yet!</p>';
                        }    
                    ?>
                </div>
            </div>
        </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <!--JS-->
    <script src="js/profile.js"></script>

</body>
</html>
        
