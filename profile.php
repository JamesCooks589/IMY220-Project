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
        <div id = "logoContainer">
            <a href="home.php"><img src="images/logo/dark1.png" alt="Whole Artedly Logo" class="img-fluid logo"></a>
        <?php if($_SESSION['id'] == $userID){ 
                echo '<h1>Hello ' . $_SESSION['username'] . '!</h1>';
            }else{
                echo '<h1>Say hello to ' . $row['username'] . '!</h1>';
                //If user is not friends with the profile they are viewing, show add friend button or if they are friends, show remove friend button
                $friends = $row['friends'];
                $friendsArray = explode(',', $friends);
                if(!in_array($_SESSION['id'], $friendsArray)){
                    echo '<form action="" method="POST"><input type="hidden" name="userID" value="' . $userID . '"><button class="btn btn-primary addFriend" name="addFriend">Add Friend</button></form>';
                }else{
                    echo '<form action="" method="POST"><input type="hidden" name="userID" value="' . $userID . '"><button class="btn btn-primary removeFriend" name="removeFriend">Remove Friend</button></form>';
                    //Message button
                    echo '<form action="messages.php" method="POST"><input type="hidden" name="userID" value="' . $userID . '"><button class="btn btn-primary message" name="message">Message</button></form>';
                }
            }


        ?>
        </div>
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
                                echo '<input type="hidden" name="userID" value="' . $userID . '">'; //hidden input for userID
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
                <div class="col-md-8 articleAndList">
                    <?php 
                        //If the user is owner of profile display toggle button between lists and articles
                        if($userID == $_SESSION['id']){
                            echo '<div class="toggle">';
                            echo '<button class="btn btn-primary active" id="articles">Articles</button>';
                            echo '<button class="btn btn-primary inactive" id="lists">Lists</button>';
                            echo '</div>';
                        }
                        echo '<div class="bigArticles style="display:block">';
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
                            }
                        }else{
                            echo '<p>No articles yet!</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                        
                        //lists hidden by default
                        echo '<div class="lists" style="display:none">';
                        
                        //Create new list button
                        echo '<form action="" method="POST">';
                        echo '<h2>Create a new list</h2>';
                        echo '<input type="hidden" name="userID" value="' . $userID . '">';
                        echo '<label for="listName">List Name</label>';
                        echo '<input type="text" class="form-control" id="listName" name="listName">';
                        echo '<label for="description">Description</label>';
                        echo '<input type="text" class="form-control" id="description" name="description">';
                        echo '<button type="submit" class="btn btn-primary" name="createList">Create List</button>';
                        echo '</form>';

                        echo '<h2>Your Lists</h2>';
                        //Loop through lists and display them
                        if(mysqli_num_rows($result3) > 0){
                            $result3 = mysqli_query($conn, $sql3);
                            mysqli_data_seek($result3, 0); // Reset the result pointer to the beginning
                            while($row3 = mysqli_fetch_assoc($result3)){
                                //A card for each list showing the title, description and number of items
                                echo '<div class="card mb-3 list">';
                                echo '<div class="row g-0">';
                                echo '<div class="col-md-8">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title title">' . $row3['listName'] . '</h5>';
                                echo '<p class="card-text">' . $row3['description'] . '</p>';
                                //Articles contains a list of article ids separated by commas
                                $articles = explode(',', $row3['articles']);
                                echo '<p class="card-text">' . count($articles) . ' items</p>';
                                //Hidden element for id
                                echo '<p class="card-text id" hidden>' . $row3['list_id'] . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }else{
                            echo '<p>No lists yet!</p>';
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

<?php 
    //Update profile
    if(isset($_POST['editProfile'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $profilePicture = $_FILES['profilePicture']['name'];

        //If the user has uploaded a new profile picture
        if($profilePicture != ''){
            $target = "images/profilePictures/" . basename($profilePicture);
            $sql = "UPDATE users SET profilePicture = '$target' WHERE id = '$userID'";
            mysqli_query($conn, $sql);
            move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target);
        }

        $sql = "UPDATE users SET name = '$name', surname = '$surname', dateOfBirth = '$dateOfBirth', email = '$email', username = '$username', password = '$password' WHERE id = '$userID'";
        mysqli_query($conn, $sql);

        //Update session variables
        $_SESSION['username'] = $username;
        
        unset($_POST['editProfile']);
        //echo a script form to post to profile.php to refresh the page include the userID so that the profile page refreshes with the correct user
        echo '<form action="profile.php" method="POST" id="refresh">';
        echo '<input type="hidden" name="userID" value="' . $userID . '">';
        echo '</form>';
        echo '<script type="text/javascript">';
        echo 'document.getElementById("refresh").submit();';
        echo '</script>';
        
    }

        //Create new list
        if(isset($_POST['createList'])){
            //Create a new list with the userID, listName and description
            //sanitize inputs
            $listName = $_POST['listName'];
            //If input is empty, show error message
            if($listName == ''){
                echo '<script type="text/javascript">';
                echo 'alert("Please enter a list name");';
                echo '</script>';
                exit();
            }
            $description = $_POST['description'];
            if($description == ''){
                echo '<script type="text/javascript">';
                echo 'alert("Please enter a description");';
                echo '</script>';
                exit();
            }
            $userID = $_POST['userID'];

            $listName = mysqli_real_escape_string($conn, $listName);
            $description = mysqli_real_escape_string($conn, $description);
            $userID = mysqli_real_escape_string($conn, $userID);
            $sql = "INSERT INTO lists (user_id, listName, description) VALUES ('$userID', '$listName', '$description')";
            mysqli_query($conn, $sql);
            unset($_POST['createList']);
            //echo a script form to post to profile.php to refresh the page include the userID so that the profile page refreshes with the correct user
            echo '<form action="profile.php" method="POST" id="refresh">';
            echo '<input type="hidden" name="userID" value="' . $userID . '">';
            echo '</form>';
            echo '<script type="text/javascript">';
            echo 'document.getElementById("refresh").submit();';
            echo '</script>';
        }
?>
        
