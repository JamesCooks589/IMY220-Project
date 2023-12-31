<?php  
    session_start();
    //If user is not logged in, redirect to login page
    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
        exit();
    }

    include 'db_connection.php';

    $userID = $_POST['userID'];

    if($userID == 1 && $_SESSION['id'] != 1){
        header("Location: home.php");
        exit();
    }


    //All sql queries for sections on profile page
    //User info
    $sql = "SELECT * FROM users WHERE id = '$userID'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);

    //Articles
    $sql2 = "SELECT * FROM articles WHERE user_id = '$userID' ORDER BY date DESC";
    $result2 = mysqli_query($mysqli, $sql2);

    //Lists
    $sql3 = "SELECT * FROM lists WHERE user_id = '$userID'";
    $result3 = mysqli_query($mysqli, $sql3);
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
            <a href="home.php"><img src="images/logo/logo_dark.png" alt="Whole Artedly Logo" class="img-fluid logo"></a>
        <?php if($_SESSION['id'] == $userID){ 
                echo '<h1>Hello ' . $_SESSION['username'] . '!</h1>';
            }else{
                echo '<h1>Say hello to ' . $row['username'] . '!</h1>';
                if($row['followers'] != ''){
                    $followers = $row['followers'];
                    $followersArray = explode(',', $followers);
                }else{
                    $followersArray = array();
                }
                //IF user is not the owner of the profile, or following the owner of the profile, show follow button
                if($userID != $_SESSION['id'] && !in_array($_SESSION['id'], $followersArray)){
                    echo '<form action="" method="POST" id="follow">';
                    echo '<input type="hidden" name="userID" value="' . $userID . '">';
                    echo '<button type="submit" class="btn btn-primary" name="follow">Follow</button>';
                    echo '</form>';
                }
                else{
                    echo '<form action="" method="POST" id="unfollow">';
                    echo '<input type="hidden" name="userID" value="' . $userID . '">';
                    echo '<button type="submit" class="btn btn-danger" name="unfollow">Unfollow</button>';
                    echo '</form>';

                    $myFollowersSQL = "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'";
                    $myFollowersResult = mysqli_query($mysqli, $myFollowersSQL);
                    $myFollowersRow = mysqli_fetch_assoc($myFollowersResult);
                    if($myFollowersRow['followers'] != ''){
                        $myFollowers = $myFollowersRow['followers'];
                        $myFollowersArray = explode(',', $myFollowers);
                    }else{
                        $myFollowersArray = array();
                    }
                    //If the user follows the owner of the profile and the owner of the profile follows the user, show message button
                    if(in_array($_SESSION['id'], $followersArray) && in_array($userID, $myFollowersArray)){
                        echo '<a href="messages.php?user1=' . $_SESSION['id'] . '&user2=' . $userID . '" class="btn btn-primary">Message</a>';
                    }

                }
            }

            function showError($message) {
                echo '<script type="text/javascript">';
                echo 'document.getElementById("errorDiv").style.display = "block";';
                echo 'document.getElementById("errorMessage").innerText = "' . $message . '";';
                echo '</script>';
            }            
        ?>
        </div>
        <div class="container">
        <div id="errorDiv" class="alert alert-danger" style="display:none;">
            <p id="errorMessage"></p>
        </div>
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

                        if ($userID == $_SESSION['id'] || $_SESSION['id'] == 1) {
                            echo '<p>First Name: ' . $row['name'] . '</p>';
                            echo '<p>Last Name: ' . $row['surname'] . '</p>';
                            echo '<p>Date of Birth: ' . $row['dateOfBirth'] . '</p>';
                            echo '<button class="btn btn-primary" id="editProfile" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>';
                            echo '<form action="deleteProfile.php" method="post" id="delete-form">';
                            echo '<input type="hidden" name="userID" value="' . $userID . '">';
                            echo '</form>';
                            echo '<form action="logout.php" method="post" id="logout-form">';
                            echo '<button type="submit" class="btn btn-warning" id="logout">Logout</button>';
                            echo '</form>';
                            echo '<button type="submit" class="btn btn-danger" id="delete">Delete Profile</button>';
                            

                            
                            // Edit Profile Modal
                            echo '<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">';
                            echo '<div class="modal-dialog modal-dialog-centered">';
                            echo '<div class="modal-content">';
                            echo '<div class="modal-header">';
                            echo '<h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>';
                            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                            echo '</div>';
                            echo '<div class="modal-body">';
                            echo '<form action="" method="POST" enctype="multipart/form-data">';
                            echo '<input type="hidden" name="userID" value="' . $userID . '">';
                            
                            // Function to create form input field with label
                            function createFormInput($id, $label, $type, $name, $value) {
                                echo '<div class="mb-3">';
                                echo '<label for="' . $id . '" class="form-label">' . $label . '</label>';
                                echo '<input type="' . $type . '" class="form-control" id="' . $id . '" name="' . $name . '" value="' . $value . '">';
                                echo '</div>';
                            }

                            // Create form inputs with labels
                            createFormInput('profilePicture', 'Profile Picture', 'file', 'profilePicture', '');
                            createFormInput('name', 'First Name', 'text', 'name', $row['name']);
                            createFormInput('surname', 'Last Name', 'text', 'surname', $row['surname']);
                            createFormInput('dateOfBirth', 'Date of Birth', 'date', 'dateOfBirth', $row['dateOfBirth']);
                            createFormInput('email', 'Email', 'email', 'email', $row['email']);
                            createFormInput('username', 'Username', 'text', 'username', $row['username']);
                            createFormInput('password', 'Password', 'password', 'password', $row['password']);
                            

                            echo '<button type="submit" class="btn btn-primary" name="editProfile">Submit</button>';
                            echo '</form>';
                            echo '</div>';
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
                    $followers = $row['followers'];
                    $followersArray = explode(',', $followers);
                    $following = $row['following'];
                    $followingArray = explode(',', $following);
                    // If the user is the owner of the profile, display toggle buttons between lists and articles
                    if ($userID == $_SESSION['id'] || in_array($_SESSION['id'], $followersArray) || in_array($_SESSION['id'], $followingArray) || $_SESSION['id'] == 1) {
                        echo '<div class="toggle">';
                        echo '    <button class="btn btn-primary active" id="articles">Articles</button>';
                        echo '<button class="btn btn-primary inactive" id="lists">Lists</button>';
                        echo '<button class="btn btn-primary inactive" id="friends">Friends</button>';
                        echo '</div>';
                    }
                ?>

                <div class="bigArticles" style="display:block">
                    <div class="articles">
                     <h2>Articles by <?php echo $row['username']; ?></h2>
                       <div class="button-group">
                        <button class="btn btn-primary active" id="createdArticles">Created</button>
                        <button class="btn btn-primary inactive" id="readArticles">Read</button>
                       </div>
                       <div class="createdArticles" style="display:block">
                            <?php
                            // Loop through articles and display them
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    // Explode and convert hashtags to uppercase
                                    $hashtags = explode(",", $row2["hashtags"]);
                                    $hashtags = array_map('strtoupper', $hashtags);
                                    if($row2['deleted'] == 1){
                                        echo '<div class="card mb-3 article" style="opacity:0.5">';
                                    }else{
                                        echo '<div class="card mb-3 article">';
                                    }?>
                                <div class='row g-0'>
                                    <div class='col-md-4'>
                                        <img src='<?php echo $row2["artPieceImage"]; ?>' alt='No Image' class='img-fluid'>
                                    </div>
                                    <div class='col-md-8'>
                                        <div class='card-body'>
                                            <div class='category'>
                                                <span class='badge bg-primary'><?php echo $row2["category"]; ?></span>
                                            </div>
                                            <?php
                                            if($row2['deleted'] == 1){
                                                echo "<h5 class='card-title title' style='text-decoration:line-through'>" . $row2["title"] . "</h5>";
                                            }else{
                                                echo "<h5 class='card-title title'>" . $row2["title"] . "</h5>";
                                            }
                                            ?>
                                            <h6 class='card-subtitle mb-2 '><?php echo $row2["author"]; ?></h6>
                                            <h6 class='card-subtitle mb-2 '><?php echo $row2["date"]; ?></h6>
                                            <p class='card-text id' hidden><?php echo $row2["article_id"]; ?></p>
                                            <p class='card-text'><?php echo $row2["summary"]; ?></p>
                                            <div class='hashtags'>
                                                <?php
                                                foreach ($hashtags as $hashtag) {
                                                    echo "<span class='badge hashtag'>$hashtag</span>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                echo '<p>No articles yet!</p>';
                            }
                            ?>
                        </div>
                        <div class="readArticles" style="display:none">
                            <?php
                                //User's read articles (readArticles is a string of article ids separated by commas)
                                $readArticles = $row['readArticles'];
                                if($readArticles != ''){
                                    $readArticlesArray = explode(',', $readArticles);
                                    foreach($readArticlesArray as $readArticleID){
                                        $sqlRead = "SELECT * FROM articles WHERE article_id = '$readArticleID'";
                                        $resultRead = mysqli_query($mysqli, $sqlRead);
                                        $rowRead = mysqli_fetch_assoc($resultRead);
                                        // Explode and convert hashtags to uppercase
                                        $hashtags = explode(",", $rowRead["hashtags"]);
                                        $hashtags = array_map('strtoupper', $hashtags);

                                        if($rowRead['deleted'] == 1){
                                            echo '<div class="card mb-3 article" style="opacity:0.5">';
                                        }else{
                                            echo '<div class="card mb-3 article">';
                                        }
                                        echo '<div class="row g-0">';
                                        echo '<div class="col-md-4">';
                                        echo '<img src="' . $rowRead["artPieceImage"] . '" alt="No Image" class="img-fluid">';
                                        echo '</div>';
                                        echo '<div class="col-md-8">';
                                        echo '<div class="card-body">';
                                        echo '<div class="category">';
                                        echo '<span class="badge bg-primary">' . $rowRead["category"] . '</span>';
                                        echo '</div>';
                                        
                                        if($rowRead['deleted'] == 1){
                                            echo '<h5 class="card-title title" style="text-decoration:line-through">' . $rowRead["title"] . '</h5>';
                                        }else{
                                            echo '<h5 class="card-title title">' . $rowRead["title"] . '</h5>';
                                        }
                                        
                                        echo '<h6 class="card-subtitle mb-2 ">' . $rowRead["author"] . '</h6>';
                                        echo '<h6 class="card-subtitle mb-2 ">' . $rowRead["date"] . '</h6>';
                                        echo '<p class="card-text id" hidden>' . $rowRead["article_id"] . '</p>';
                                        echo '<p class="card-text">' . $rowRead["summary"] . '</p>';
                                        echo '<div class="hashtags">';
                                        foreach ($hashtags as $hashtag) {
                                            echo "<span class='badge hashtag'>$hashtag</span>";
                                        }
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                }else{
                                    echo '<p>No read articles yet!</p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="lists" style="display:none">
                    <?php
                    //Only display create list form if the user is the owner of the profile
                    if ($userID == $_SESSION['id']) {
                            // Create a new list form
                        echo '<form action="" method="POST">';
                        echo '<h2>Create a new list</h2>';
                        echo '<input type="hidden" name="userID" value="' . $userID . '">';
                        echo '<label for="listName">List Name</label>';
                        echo '<input type="text" class="form-control" id="listName" name="listName">';
                        echo '<label for="description">Description</label>';
                        echo '<input type="text" class="form-control" id="description" name="description">';
                        echo '<button type="submit" class="btn btn-primary" name="createList">Create List</button>';
                        echo '</form>';
                    }
                    if ($userID == $_SESSION['id']) {
                        echo '<h2>Your Lists</h2>';
                    } else {
                        echo '<h2>' . $row['username'] . '\'s Lists</h2>';
                    }
                    
                    // Loop through lists and display them
                    if (mysqli_num_rows($result3) > 0) {
                        $result3 = mysqli_query($mysqli, $sql3);
                        mysqli_data_seek($result3, 0); // Reset the result pointer to the beginning
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            // A card for each list showing the title, description, and number of items
                            echo '<div class="card mb-3 list">';
                            echo '<div class="row g-0">';
                            echo '<div class="col-md-8">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title title">' . $row3['listName'] . '</h5>';
                            echo '<p class="card-text">' . $row3['description'] . '</p>';
                            // Articles contain a list of article ids separated by commas
                            if ($row3['articles'] != '') {
                                $articles = $row3['articles'];
                                $articlesArray = explode(',', $articles);
                                //Display each article if article's deleted field is marked as 1 (deleted) give it an opacity of 0.5
                                foreach ($articlesArray as $articleID) {
                                    $sql = "SELECT * FROM articles WHERE article_id = '$articleID'";
                                    $result = mysqli_query($mysqli, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    if($row['deleted'] == 1){
                                        echo '<div class="article" style="opacity:0.5">';
                                    }else{
                                        echo '<div class="article">';
                                    }
                                    echo '<div class="row g-0">';
                                    echo '<div class="col-md-4">';
                                    echo '<img src="' . $row['artPieceImage'] . '" alt="No Image" class="img-fluid">';
                                    echo '</div>';
                                    echo '<div class="col-md-8">';
                                    echo '<div class="card-body">';
                                    echo '<div class="category">';
                                    echo '<span class="badge bg-primary">' . $row['category'] . '</span>';
                                    echo '</div>';
                                    //If deleted, show title with strikethrough
                                    if($row['deleted'] == 1){
                                        echo '<h5 class="card-title title" style="text-decoration:line-through">' . $row['title'] . '</h5>';
                                    }else{
                                        echo '<h5 class="card-title title">' . $row['title'] . '</h5>';
                                    }
                                    echo '<h6 class="card-subtitle mb-2 ">' . $row['author'] . '</h6>';
                                    echo '<h6 class="card-subtitle mb-2 ">' . $row['date'] . '</h6>';
                                    echo '<p class="card-text id" hidden>' . $row['article_id'] . '</p>';
                                    echo '<p class="card-text">' . $row['summary'] . '</p>';
                                    echo '<p hidden id="articleID">' . $row['article_id'] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p class="card-text">0 items</p>';
                            }
                            echo '<p class="card-text id" hidden>' . $row3['list_id'] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No lists yet!</p>';
                    }
                    ?>
                </div>

                <!--Followers-->
                <div class="friends" style="display:none">
                    <div class="button-group">
                        <button class="btn btn-primary active" id="followers">Followers</button>
                        <button class="btn btn-primary inactive" id="following">Following</button>
                    </div>
                    <div class="followers" style="display:none">
                        <?php
                        $sqlFollowers = "SELECT * FROM users WHERE id = '$userID'";
                        $resultFollowers = mysqli_query($mysqli, $sqlFollowers);
                        $rowFollowers = mysqli_fetch_assoc($resultFollowers);
                        // Loop through followers and display them
                        if ($rowFollowers['followers'] != '') {
                            echo '<h2>Followers</h2>';
                            $followers = $rowFollowers['followers'];
                            $followersArray = explode(',', $followers);
                            foreach ($followersArray as $followerID) {
                                $sql = "SELECT * FROM users WHERE id = '$followerID'";
                                $result = mysqli_query($mysqli, $sql);
                                $row = mysqli_fetch_assoc($result);
                                // A card for each follower showing the username and profile picture
                                echo '<div class="card mb-3 follower">';
                                echo '<div class="card-header">';
                                echo '<h5 class="card-title title">' . $row['username'] . '</h5>';
                                echo '</div>';
                                echo '<div class="card-body">';
                                echo '<img src="' . $row['profilePicture'] . '" alt="Profile Picture" class="img-fluid">';
                                echo '</div>'; 
                                echo '</div>';
                            }
                        } else {
                            echo '<p>No followers yet!</p>';
                        }
                        ?>
                    </div>
                    
                    <!--Following-->
                    <div class="following" style="display:none">
                        <?php
                        $sqlFollowing = "SELECT * FROM users WHERE id = '$userID'";
                        $resultFollowing = mysqli_query($mysqli, $sqlFollowing);
                        $rowFollowing = mysqli_fetch_assoc($resultFollowing);
                        // Loop through following and display them
                        if ($rowFollowing['following'] != '') {
                            echo '<h2>Following</h2>';
                            $following = $rowFollowing['following'];
                            $followingArray = explode(',', $following);
                            foreach ($followingArray as $followingID) {
                                $sql = "SELECT * FROM users WHERE id = '$followingID'";
                                $result = mysqli_query($mysqli, $sql);
                                $rowFollowing = mysqli_fetch_assoc($result);
                                // A card for each following showing the username and profile picture
                                echo '<div class="card mb-3 followingCard">';
                                echo '<div class="card-header">';
                                echo '<h5 class="card-title title">' . $rowFollowing['username'] . '</h5>';
                                echo '</div>';
                                echo '<div class="card-body">';
                                echo '<img src="' . $rowFollowing['profilePicture'] . '" alt="Profile Picture" class="img-fluid">';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>Not following anyone yet!</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
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

        //Check if all fields are filled in
        if ($name == '' || $surname == '' || $dateOfBirth == '' || $email == '' || $username == '' || $password == '') {
            showError("Please fill in all fields");
            exit();
        }

        //Check if email already exists and does not belong to the user
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0 && $row['id'] != $userID) {
            showError("Email already exists");
            exit();
        }

        //Sanitize inputs
        $name = mysqli_real_escape_string($mysqli, $name);
        $surname = mysqli_real_escape_string($mysqli, $surname);
        $dateOfBirth = mysqli_real_escape_string($mysqli, $dateOfBirth);
        $email = mysqli_real_escape_string($mysqli, $email);
        $username = mysqli_real_escape_string($mysqli, $username);
        $password = mysqli_real_escape_string($mysqli, $password);
        

        //If the user has uploaded a new profile picture
        if($profilePicture != ''){
            $target = "images/profilePictures/" . basename($_FILES['profilePicture']['name']);
            $sql = "UPDATE users SET profilePicture = '$target' WHERE id = '$userID'";
            mysqli_query($mysqli, $sql);
            move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target);
            $_SESSION['profilePicture'] = $target;
        }

        $sql = "UPDATE users SET name = '$name', surname = '$surname', dateOfBirth = '$dateOfBirth', email = '$email', username = '$username', password = '$password' WHERE id = '$userID'";
        mysqli_query($mysqli, $sql);

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
            if ($listName == '') {
                showError("Please enter a list name");
                exit();
            }
            $description = $_POST['description'];
            if ($description == '') {
                showError("Please enter a description");
                exit();
            }
            $userID = $_POST['userID'];

            $listName = mysqli_real_escape_string($mysqli, $listName);
            $description = mysqli_real_escape_string($mysqli, $description);
            $userID = mysqli_real_escape_string($mysqli, $userID);
            $sql = "INSERT INTO lists (user_id, listName, description) VALUES ('$userID', '$listName', '$description')";
            mysqli_query($mysqli, $sql);
            unset($_POST['createList']);
            //echo a script form to post to profile.php to refresh the page include the userID so that the profile page refreshes with the correct user
            echo '<form action="profile.php" method="POST" id="refresh">';
            echo '<input type="hidden" name="userID" value="' . $userID . '">';
            echo '</form>';
            echo '<script type="text/javascript">';
            echo 'document.getElementById("refresh").submit();';
            echo '</script>';
        }

        //Follow user
        //Add my id to their followers and add their id to my following
        //Followers and following are both just a string list of ids seperated by commas
        //So if it is empty, just add the id else add a comma and the id
        if(isset($_POST['follow'])){
            $userID = $_POST['userID'];
            $sql = "SELECT * FROM users WHERE id = '$userID'";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);
            $followers = $row['followers'];
            if($followers == ''){
                $followers = $_SESSION['id'];
            }else{
                $followers = $followers . ',' . $_SESSION['id'];
            }
            $sql = "UPDATE users SET followers = '$followers' WHERE id = '$userID'";
            mysqli_query($mysqli, $sql);

            $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);
            $following = $row['following'];
            if($following == ''){
                $following = $userID;
            }else{
                $following = $following . ',' . $userID;
            }
            $sql = "UPDATE users SET following = '$following' WHERE id = '" . $_SESSION['id'] . "'";
            mysqli_query($mysqli, $sql);

            unset($_POST['follow']);
            //echo a script form to post to profile.php to refresh the page include the userID so that the profile page refreshes with the correct user
            echo '<form action="profile.php" method="POST" id="refresh">';
            echo '<input type="hidden" name="userID" value="' . $userID . '">';
            echo '</form>';
            echo '<script type="text/javascript">';
            echo 'document.getElementById("refresh").submit();';
            echo '</script>';
        }

        //Unfollow user
        //Remove my id from their followers and remove their id from my following
        if(isset($_POST['unfollow'])){
            $userID = $_POST['userID'];
            $sql = "SELECT * FROM users WHERE id = '$userID'";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);
            $followers = $row['followers'];
            $followersArray = explode(',', $followers);
            $followersArray = array_diff($followersArray, array($_SESSION['id']));
            $followers = implode(',', $followersArray);
            $sql = "UPDATE users SET followers = '$followers' WHERE id = '$userID'";
            mysqli_query($mysqli, $sql);

            $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);
            $following = $row['following'];
            $followingArray = explode(',', $following);
            $followingArray = array_diff($followingArray, array($userID));
            $following = implode(',', $followingArray);
            $sql = "UPDATE users SET following = '$following' WHERE id = '" . $_SESSION['id'] . "'";
            mysqli_query($mysqli, $sql);

            unset($_POST['unfollow']);
            //echo a script form to post to profile.php to refresh the page include the userID so that the profile page refreshes with the correct user
            echo '<form action="profile.php" method="POST" id="refresh">';
            echo '<input type="hidden" name="userID" value="' . $userID . '">';
            echo '</form>';
            echo '<script type="text/javascript">';
            echo 'document.getElementById("refresh").submit();';
            echo '</script>';
        }
?>
        
