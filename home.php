<?php 
    session_start();
    include("db_connection.php");
    If(isset($_POST['state'])){
      $_SESSION['state'] = $_POST['state'];
    }
    $state = $_SESSION['state'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
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
    <link href="css/home.css" type="text/css" rel="stylesheet">
    <!-- JS -->
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body>
  <!-- Banner with and Profile Picture -->
    <img src="images/starry_night.png" alt="Banner" class="img-fluid">
  <!-- Search bar -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form method="POST" action="">
          <div class="input-group mb-3">
            <input type="text" class="form-control searchBar" placeholder="Search" aria-label="Search" aria-describedby="search" name="search">
            <button class="btn btn-primary" type="submit" id="search" name="searchButton"><i class="lni lni-search-alt"></i></button>
          </div>
        </form>
      </div>
    </div>
  <nav>
  <div id="feeds">
        <?php
          if($state == "global"){
            echo "<button class='btn btn-primary inactive' id='local'>Following</button>";
            echo "<button class='btn btn-primary active' id='global'>Global</button>";
          }
          else{
            echo "<button class='btn btn-primary active' id='local'>Following</button>";
            echo "<button class='btn btn-primary inactive' id='global'>Global</button>";
          }
        ?>
            
    </div>
    
    <div id="profilePicture">
      <img src=<?php echo $_SESSION['profilePicture'] ?> alt="Profile Picture" class="img-fluid rounded-circle" id="profile-pic">
      <!-- hidden input with user id -->
      <input type="hidden" id="userID" value="<?php echo $_SESSION['id'] ?>">
    </div>
  </nav>
  <!-- Body content -->

  <!-- Articles -->
  <div class="container">
    <div id="errorDiv" class="alert alert-danger" style="display:none;">
      <p id="errorMessage"></p>
    </div>
    <?php
      function showError($message) {
        echo '<script type="text/javascript">';
        echo 'document.getElementById("errorDiv").style.display = "block";';
        echo 'document.getElementById("errorMessage").innerText = "' . $message . '";';
        echo '</script>';
      }
    ?>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div id="articles">
          <!-- articles -->
            <?php 
            //Get all articles in reverse chronological order
              if($state == "global"){
                $fetchQuery = "SELECT * FROM `articles` ORDER BY `date` DESC";
                $result = $mysqli->query($fetchQuery);
                if($result->num_rows > 0){
                  //Seek to first row
                  $result->data_seek(0);
                  while($row = $result->fetch_assoc()){
                    //Explode and all caps hashtags
                    $hashtags = explode(",", $row["hashtags"]);
                    $hashtags = array_map('strtoupper', $hashtags);
                    echo "<div class='card mb-3 article'>";
                      echo "<div class='row g-0'>";
                      echo "<div class='col-md-4'>";
                      echo "<img src='".$row["artPieceImage"]."' alt='No Image' class='img-fluid'>";
                      echo "</div>";
                      echo "<div class='col-md-8'>";
                      echo "<div class='card-body'>";
                      echo "<div class='category'>";
                      echo "<span class='badge bg-primary'>".$row["category"]."</span>";
                      echo "</div>";
                      echo "<h5 class='card-title title'>".$row["title"]."</h5>";
                      echo "<h6 class='card-subtitle mb-2 '>".$row["author"]."</h6>";
                      echo "<h6 class='card-subtitle mb-2 '>".$row["date"]."</h6>";
                      //Hidden element for id
                      echo "<p class='card-text id' hidden>".$row["article_id"]."</p>";
                      
                      echo "<p class='card-text'>".$row["summary"]."</p>";
                      echo "<div class='hashtags'>";
                      foreach($hashtags as $hashtag){
                        echo "<span class='badge hashtag'>".$hashtag."</span>";
                      }
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";
                    echo "</div>";
                  }
                }
                else{
                  echo "<h1>No articles found</h1>";
                }
              }
              else{
                //Show all articles made by all users that the user follows
                $userID = $_SESSION["id"];
                //Create an array of all users that the user follows
                $fetchFollowing = "SELECT `following` FROM users where `id` = $_SESSION[id]";
                $result = $mysqli->query($fetchFollowing);
                $following = $result->fetch_assoc();
                $following = explode(",", $following["following"]);
                //Get all articles made by users that the user follows
                foreach($following as $followedUser){
                  $fetchQuery = "SELECT * FROM `articles` WHERE `user_id` = $followedUser ORDER BY `date` DESC";
                  $result = $mysqli->query($fetchQuery);
                  if($result->num_rows > 0){
                    //Seek to first row
                    $result->data_seek(0);
                    while($row = $result->fetch_assoc()){
                      //Explode and all caps hashtags
                      $hashtags = explode(",", $row["hashtags"]);
                      $hashtags = array_map('strtoupper', $hashtags);
                      echo "<div class='card mb-3 article'>";
                        echo "<div class='row g-0'>";
                        echo "<div class='col-md-4'>";
                        echo "<img src='".$row["artPieceImage"]."' alt='No Image' class='img-fluid'>";
                        echo "</div>";
                        echo "<div class='col-md-8'>";
                        echo "<div class='card-body'>";
                        echo "<div class='category'>";
                        echo "<span class='badge bg-primary'>".$row["category"]."</span>";
                        echo "</div>";
                        echo "<h5 class='card-title title'>".$row["title"]."</h5>";
                        echo "<h6 class='card-subtitle mb-2 '>".$row["author"]."</h6>";
                        echo "<h6 class='card-subtitle mb-2 '>".$row["date"]."</h6>";
                        //Hidden element for id
                        echo "<p class='card-text id' hidden>".$row["article_id"]."</p>";
                        
                        echo "<p class='card-text'>".$row["summary"]."</p>";
                        echo "<div class='hashtags'>";
                        foreach($hashtags as $hashtag){
                          echo "<span class='badge hashtag'>".$hashtag."</span>";
                        }
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                      echo "</div>";
                    }
                  }
                  else{
                    echo "<h1>No articles found</h1>";
                  }
                }
              }             
            
            ?>
        </div>
      </div>
    </div>
  </div>
          

  <!-- Fixed button -->
  <div class="fixed-button">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#articleModal"><i class="lni lni-plus"></i></button>
  </div>

   <!-- Modal for adding article -->
   <!-- Modal -->
<div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="articleModalLabel">Create Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="articleTitle" name="articleTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="articleSummary" class="form-label">Summary</label>
                        <textarea class="form-control" id="articleSummary" rows="3" name="articleSummary" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="articleBody" class="form-label">Article Body</label>
                        <textarea class="form-control" id="articleBody" rows="6" name="articleBody" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="artistName" class="form-label">Artist</label>
                        <input type="text" class="form-control" id="artistName" name="artistName" required>
                    </div>
                    <div class="mb-3">
                        <label for="artPieceTitle" class="form-label">Art Piece Title</label>
                        <input type="text" class="form-control" id="artPieceTitle" name="artPieceTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="hashtags" class="form-label">Hashtags</label>
                        <input type="text" class="form-control" id="hashtags" name="hashtags" placeholder="Enter hashtags separated by commas">
                    </div>
                    <div class="mb-3">
                        <label for="categorySelect" class="form-label">Category</label>
                        <select class="form-select" id="categorySelect" name="categorySelect" required>
                          <option selected disabled value="">Choose a category</option>
                          <?php
                            $query = "SELECT * FROM `categories`";
                            $result = $mysqli->query($query);
                            if($result->num_rows > 0){
                              //Seek to first row
                              $result->data_seek(0);
                              while($row = $result->fetch_assoc()){
                                echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
                              }
                            }
                          ?>
                        </select>
                    </div>
                    <!--Image upload-->
                    <div class="mb-3">
                      <label for="artPieceImage" class="form-label">Add an image about showing the art</label>
                      <input class="form-control" type="file" id="artPieceImage" name="artPieceImage" accept="image/*" required>
                    </div>


                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="createArticle">Create</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

  <?php

    //Add article function
      if(isset($_POST["createArticle"])){
        $userID = $_SESSION["id"];
          $title = $_POST["articleTitle"];
          $author = $_SESSION["username"];
          $summary = $_POST["articleSummary"];
          $body = $_POST["articleBody"];
          $artist = $_POST["artistName"];
          $artPieceTitle = $_POST["artPieceTitle"];
          $hashtags = $_POST["hashtags"];
          $category = $_POST["categorySelect"];
          //Date is current date expressed as YYYY-MM-DD
          $date = date("Y-m-d");

          //Check all fields are filled
          if($title == "" || $summary == "" || $body == "" || $artist == "" || $artPieceTitle == "" || $hashtags == "" || $category == ""){
            showError("Please fill in all fields");
            exit();
          }
          var_dump($_FILES);
          //Image upload
          if(isset($_FILES["artPieceImage"])){
            $target_dir = "images/gallery/";
            $target_file = $target_dir . basename($_FILES["artPieceImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image

            $check = getimagesize($_FILES["artPieceImage"]["tmp_name"]);
            if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              showError("File is not an image.");
              $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["artPieceImage"]["size"] > 500000) {
              showError("Sorry, your file is too large.");
              $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
              showError("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
              $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              showError("Sorry, your file was not uploaded.");
            // if everything is ok, try to upload file
            } else {
              //Hash file name
              $hash = hash('md5', $_FILES["artPieceImage"]["name"]);
              $target_file = $target_dir . $hash . "." . $imageFileType;
              $filename = $hash . "." . $imageFileType;
              if (move_uploaded_file($_FILES["artPieceImage"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["artPieceImage"]["name"])). " has been uploaded.";
                $artPieceImage = $target_file;
              } else {
                  showError("Sorry, there was an error uploading your file.");
              }
            }
          }
          else{
            showError("Please upload an image");
          }

          //Error checking and sanitization
          $title = $mysqli->real_escape_string($title);
          $author = $mysqli->real_escape_string($author);
          $summary = $mysqli->real_escape_string($summary);
          $body = $mysqli->real_escape_string($body);
          $artist = $mysqli->real_escape_string($artist);
          $artPieceTitle = $mysqli->real_escape_string($artPieceTitle);
          $hashtags = $mysqli->real_escape_string($hashtags);
          $category = $mysqli->real_escape_string($category);
          $date = $mysqli->real_escape_string($date);

          $query = "INSERT INTO `articles`(`article_id`, `user_id`, `title`, `author`, `summary`, `body`, `artist`, `artPieceTitle`, `artPieceImage`, `hashtags`, `category`, `date`) VALUES (NULL, '$userID', '$title', '$author', '$summary', '$body', '$artist', '$artPieceTitle', '$artPieceImage', '$hashtags', '$category', '$date')";
          $mysqli->query($query);

          //If error occurs in query, alert error
          if($mysqli->error){
            showError("Error creating article");
            exit();
          }
          
          //Stop page from resubmitting form
          echo "<script>window.location.href = 'home.php'</script>";
          unset($_POST["createArticle"]);


        }

        echo "<script src='js/home.js'></script>";
  ?>

  <!--Search bar functionality-->
  <!--Search for articles by title, date, summary, artist, art piece title, hashtags, category-->
  <?php
    if(isset($_POST["searchButton"])){
      //Clear articles div
      echo "<script>$('#articles').empty()</script>";
      //Get search term
      $search = $_POST["search"];
      $search = $mysqli->real_escape_string($search);
      $query = "SELECT * FROM `articles` WHERE `title` LIKE '%$search%' OR `date` LIKE '%$search%' OR `summary` LIKE '%$search%' OR `artist`  LIKE '%$search%' OR `artPieceTitle` LIKE '%$search%' OR `hashtags` LIKE '%$search%' OR `category` LIKE '%$search%' OR `author` LIKE '%$search%' ORDER BY `date` DESC";
      $result = $mysqli->query($query);
      if($result->num_rows > 0){
        //Seek to first row
        $result->data_seek(0);
        echo "<h1>Articles containing '$search'</h1>";
        while($row = $result->fetch_assoc()){
          //Explode and all caps hashtags
          $hashtags = explode(",", $row["hashtags"]);
          $hashtags = array_map('strtoupper', $hashtags);
          echo "<div class='card mb-3 article'>";
            echo "<div class='row g-0'>";
            echo "<div class='col-md-4'>";
            echo "<img src='".$row["artPieceImage"]."' alt='No Image' class='img-fluid'>";
            echo "</div>";
            echo "<div class='col-md-8'>";
            echo "<div class='card-body'>";
            echo "<div class='category'>";
            echo "<span class='badge bg-primary'>".$row["category"]."</span>";
            echo "</div>";
            echo "<h5 class='card-title title'>".$row["title"]."</h5>";
            echo "<h6 class='card-subtitle mb-2 '>".$row["author"]."</h6>";
            echo "<h6 class='card-subtitle mb-2 '>".$row["date"]."</h6>";
            //Hidden element for id
            echo "<p class='card-text id' hidden>".$row["article_id"]."</p>";
            
            echo "<p class='card-text'>".$row["summary"]."</p>";
            echo "<div class='hashtags'>";
            foreach($hashtags as $hashtag){
              echo "<span class='badge hashtag'>".$hashtag."</span>";
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          echo "</div>";
        }
      }
      else{
        echo "<h1>No articles found</h1>";
      }
    }

    //Search for users by username, name or email
    if(isset($_POST["searchButton"])){
      //Clear articles div
      echo "<script>$('#articles').empty()</script>";
      //Get search term
      $search = $_POST["search"];
      $search = $mysqli->real_escape_string($search);
      $query = "SELECT * FROM `users` WHERE `username` LIKE '%$search%' OR `name` LIKE '%$search%' OR `email` LIKE '%$search%'";
      $result = $mysqli->query($query);
      if($result->num_rows > 0){
        //Seek to first row
        $result->data_seek(0);
        echo "<h1>Users containing '$search'</h1>";
        while($row = $result->fetch_assoc()){
          echo "<div class='card mb-3 user'>";
            echo "<div class='row g-0'>";
            echo "<div class='col-md-4'>";
            echo "<img src='".$row["profilePicture"]."' alt='No Image' class='img-fluid'>";
            echo "</div>";
            echo "<div class='col-md-8'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title title'>".$row["username"]."</h5>";
            echo "<h6 class='card-subtitle mb-2 '>".$row["name"]."</h6>";
            echo "<h6 class='card-subtitle mb-2 '>".$row["email"]."</h6>";
            //Hidden element for id
            echo "<input type='hidden' class='card-text' name='userID' id='searchID' value='".$row["id"]."'>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
      }
      else{
        echo "<h1>No users found</h1>";
      }
    }
  ?>

  <?php
    //Admin account
    if($_SESSION["id"] == 1){
      //allow admin to add categories
      echo "<form method='POST' action=''>";
      echo "<div class='mb-3'>";
      echo "<label for='categoryName' class='form-label'>Category Name</label>";
      echo "<input type='text' class='form-control' id='categoryName' name='categoryName' required>";
      echo "</div>";
      echo "<button type='submit' class='btn btn-primary' name='addCategory'>Add Category</button>";
      echo "</form>";

      //Add category function
      if(isset($_POST["addCategory"])){
        $categoryName = $_POST["categoryName"];
        $categoryName = $mysqli->real_escape_string($categoryName);
        $query = "INSERT INTO `categories`(`name`) VALUES ('$categoryName')";
        $mysqli->query($query);
        //If error occurs in query, alert error
        if($mysqli->error){
          showError("Error adding category");
          exit();
        }
        //Stop page from resubmitting form
        echo "<script>window.location.href = 'home.php'</script>";
        unset($_POST["addCategory"]);
      }

      //allow admin to delete categories
      echo "<form method='POST' action=''>";
      echo "<div class='mb-3'>";
      echo "<label for='categoryName' class='form-label'>Category Name</label>";
      echo "<select class='form-select' id='categorySelect' name='categorySelect' required>";
      echo "<option selected disabled value=''>Choose a category</option>";
      $query = "SELECT * FROM `categories`";
      $result = $mysqli->query($query);
      if($result->num_rows > 0){
        //Seek to first row
        $result->data_seek(0);
        while($row = $result->fetch_assoc()){
          echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
        }
      }
      echo "</select>";
      echo "</div>";
      echo "<button type='submit' class='btn btn-primary' name='deleteCategory'>Delete Category</button>";
      echo "</form>";

      //Delete category function
      if(isset($_POST["deleteCategory"])){
        $categoryName = $_POST["categorySelect"];
        $categoryName = $mysqli->real_escape_string($categoryName);
        $query = "DELETE FROM `categories` WHERE `name` = '$categoryName'";
        $mysqli->query($query);
        //If error occurs in query, alert error
        if($mysqli->error){
          showError("Error deleting category");
          exit();
        }
        //Stop page from resubmitting form
        echo "<script>window.location.href = 'home.php'</script>";
        unset($_POST["deleteCategory"]);
      }
    }
  ?>




  <!-- Include Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
