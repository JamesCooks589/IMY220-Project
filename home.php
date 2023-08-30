<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!--Line Icons-->
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
  <!-- CSS -->
  <link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
  <!-- Banner with and Profile Picture -->
  <img src="images/starry_night.png" alt="Banner" class="img-fluid">
  <img src="images/profile_pic.png" alt="Profile Picture" class="img-fluid rounded-circle" id="profile-pic">

  <!-- Body content -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div id="articles">
          <!-- Card 1 -->
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="path/to/article-image1.jpg" alt="Article 1" class="img-fluid">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                    <div class="categorty">
                        <span class="badge bg-primary">Category</span>
                    </div>
                  <h5 class="card-title">Title 1</h5>
                  <h6 class="card-subtitle mb-2 text-muted">John Doe</h6>
                  <div class="hashtags">
                    <span class="badge rounded-pill bg-primary hashtag">Primary</span>
                    <span class="badge rounded-pill bg-secondary hashtag">Secondary</span>
                    <span class="badge rounded-pill bg-success hashtag">Success</span>
                  </div>
                  <p class="card-text">Summary of the article goes here.</p>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Card 2 -->
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="path/to/article-image1.jpg" alt="Article 2" class="img-fluid">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Title 2</h5>
                  <h6 class="card-subtitle mb-2 text-muted">John Doe</h6>
                  <p class="card-text">Summary of the article goes here.</p>
                </div>
              </div>
            </div>
          </div>

        <!-- Card 3 -->
            <div class="card mb-3">
                <div class="row g-0">
                <div class="col-md-4">
                    <img src="path/to/article-image1.jpg" alt="Article 3" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">Title 3</h5>
                    <h6 class="card-subtitle mb-2 text-muted">John Doe</h6>
                    <p class="card-text">Summary of the article goes here.</p>
                    </div>
                </div>
                </div>
            </div>

        <!-- Card 4 -->
        <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="path/to/article-image1.jpg" alt="Article 4" class="img-fluid">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Title 4</h5>
                  <h6 class="card-subtitle mb-2 text-muted">John Doe</h6>
                  <p class="card-text">Summary of the article goes here.</p>
                </div>
              </div>
            </div>
          </div>

        <!-- Card 5 -->
        <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="path/to/article-image1.jpg" alt="Article 5" class="img-fluid">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Title 5</h5>
                  <h6 class="card-subtitle mb-2 text-muted">John Doe</h6>
                  <p class="card-text">Summary of the article goes here.</p>
                </div>
              </div>
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>

  <!-- Fixed button -->
  <div class="fixed-button">
    <button class="btn btn-primary"><i class="lni lni-plus"></i></button>
  </div>

  <!-- Include Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
