<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash</title>
    <meta name="Author" content="James Cooks u21654680">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/splash.css">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div id="beforeFold">
        <div id="topRight">
            <button id="login">Login</button>
            <button id="signup" class="signUp">Sign up</button>
        </div>
        <div id="foldContent">
            <h1>wholEArtidley</h1>
            <h2>Where feelings meet expression</h2>
        <img src="images/logo/dark1.png" id="visual1"/>
        </div>
        <button id="join1" class="signUp">Join us now</button>
        <div id="socialProof">
            <h2>What our users are saying</h2>
            <img class="tweet" src="images\socialProof\bill.png" alt="Bill Gates">
            <img class="tweet" src="images\socialProof\barack.png" alt="Barack Obama">
            <img class="tweet" src="images\socialProof\warren.png" alt="Warren Buffet">
        </div>
    </div>
    <div id="afterFold">
        <div id="features">
            <div class="feature">
                <h1>Express Yourself</h1>
                <p>Experience the stirring power of art. At wholEArtidley, we provide a platform for you to openly exchange and express those heartfelt emotions.</p>
            </div>
            <div class="feature">
                <h1>Connect</h1>
                <p>Join our vibrant community and experience the profound emotional connections art has forged among users.</p>
            </div>  
            <div class="feature">
                <h1>Ease of Use</h1>
                <p>Our intuitive interface makes it easy for you to share your feelings and connect with others.</p>
            </div>
        </div>
        <!--FAQ-->
        <div class="accordion" id="faqAccordion">
        <!-- Question 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="question1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#answer1" aria-expanded="false" aria-controls="answer1">
                What type of art can I post?
            </button>
            </h2>
            <div id="answer1" class="accordion-collapse collapse" aria-labelledby="question1" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                You can post any form of visual art, including but not limited to paintings, drawings, digital art, sculptures, and photography.
            </div>
            </div>
        </div>
        
        <!-- Question 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="question2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer2" aria-expanded="false" aria-controls="answer2">
                Does it have to be my art?
            </button>
            </h2>
            <div id="answer2" class="accordion-collapse collapse" aria-labelledby="question2" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Yes, the art you post should be your own original work. Plagiarized or copyrighted content may not be allowed.
            </div>
            </div>
        </div>
        
        <!-- Question 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="question3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer3" aria-expanded="false" aria-controls="answer3">
                How do I start?
            </button>
            </h2>
            <div id="answer3" class="accordion-collapse collapse" aria-labelledby="question3" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                To get started, create an account on our platform and navigate to the "Submit Art" section. From there, you can upload your artwork and provide the necessary details.
            </div>
            </div>
        </div>
        
        <!-- Question 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="question4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer4" aria-expanded="false" aria-controls="answer4">
                Should it be serious?
            </button>
            </h2>
            <div id="answer4" class="accordion-collapse collapse" aria-labelledby="question4" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Your art can be as serious or as lighthearted as you'd like. We welcome a diverse range of artistic expressions.
            </div>
            </div>
        </div>
        </div>

        <h2>So what are you waiting for ?</h2>
        <button id="join2" class="signUp">Join us now</button>
    </div>


    <dialog id="signupModal">
        <div id="signupModalContent">
            <span class="close">&times;</span>
            <h1>Sign up</h1>
            <form action="php/signup.php" method="POST">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="password" name="password2" placeholder="Confirm Password" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="submit" value="Sign up">
            </form>
        </div>
    </dialog>

    <dialog id="loginModal">
        <div id="loginModalContent">
            <span class="close">&times;</span>
            <h1>Login</h1>
            <form action="php/login.php" method="POST">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </dialog>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>