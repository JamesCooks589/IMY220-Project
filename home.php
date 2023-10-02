<?php 
    session_start();
    $mysqli = new mysqli("localhost", "root", "", "wholeartedly");
    if($mysqli->connect_error){
      die("Connection failed: " . $mysqli->connect_error);
    }
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
  <nav>
  <div id="feeds">
        <button class="btn btn-primary inactive" id="local">Local</button>
        <button class="btn btn-primary active" id="global">Global</button>
    </div>
    
    <img src="images/profilePictures/placeholder.jpg" alt="Profile Picture" class="img-fluid rounded-circle" id="profile-pic">
  </nav>
  <!-- Body content -->

  <!-- Articles -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div id="articles">
          <!-- articles -->
            <?php 
            //Get all articles in reverse chronological order
              $fetchQuery = "SELECT * FROM `articles` ORDER BY `date` DESC";
              $result = $mysqli->query($fetchQuery);
              if($result->num_rows > 0){
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
                <form method="POST" action="">
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
                          <!--Ordered alphabetically-->
                        <option value="" disabled selected>Select a category</option>
                          <option value="visual_art">Visual Art</option>
                          <option value="sculpture">Sculpture</option>
                          <option value="music">Music</option>
                          <option value="literature">Literature</option>
                          <option value="performing_art">Performing Art</option>
                          <option value="theatre">Theatre</option>
                          <option value="film">Film</option>
                          <option value="architecture">Architecture</option>
                          <option value="fashion">Fashion</option>
                          <option value="photography">Photography</option>
                          <option value="digital_art">Digital Art</option>
                        </select>
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

    if(isset($_POST["createArticle"])){
      echo "<script>console.log('createArticle')</script>";
    }

    //Add article function
      if(isset($_POST["createArticle"])){
        $userID = $_SESSION["id"];
          $title = $_POST["articleTitle"];
          $author = $_SESSION["username"];
          $summary = $_POST["articleSummary"];
          $body = $_POST["articleBody"];
          $artist = $_POST["artistName"];
          $artPieceTitle = $_POST["artPieceTitle"];
          $artPieceImage = "images/gallery/placeholder.png";
          $hashtags = $_POST["hashtags"];
          $category = $_POST["categorySelect"];
          //Date is current date expressed as YYYY-MM-DD
          $date = date("Y-m-d");

          $query = "INSERT INTO `articles`(`article_id`, `user_id`, `title`, `author`, `summary`, `body`, `artist`, `artPieceTitle`, `artPieceImage`, `hashtags`, `category`, `date`) VALUES (NULL, '$userID', '$title', '$author', '$summary', '$body', '$artist', '$artPieceTitle', '$artPieceImage', '$hashtags', '$category', '$date')";
          $mysqli->query($query);

          //If error occurs in query, alert error
          if($mysqli->error){
            echo "<script>alert(".$mysqli->error.")</script>";
          }
          

          //If successful, alert success then refresh page
          echo "<script>alert('Article successfully created!')</script>";
          echo "<script>window.location.href='home.php'</script>";

        }

        echo "<script src='js/home.js'></script>";
  ?>

  <!-- Include Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
