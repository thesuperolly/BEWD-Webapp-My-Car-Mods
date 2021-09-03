<?php
// initialize the session.
include "codeSnippets/start_session.php";
 
// checks is user is loggin in and redirects to login page if not.
include "codeSnippets/loginCheck.php";

// checks is user is loggin in and redirects to login page if not.
include "codeSnippets/welcomePageCode.php";
?>


 

<?php include "templates/header.php" ?>

<!-- Hero START -->
<div class="hero hero-sm">
  <div class="container">
    <div class="hero-body">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your project page.</h1>
        <a href="create.php" class="btn">Create A New Project</a>
    </div>
  </div>
</div>
<!-- Hero END -->


    <main>
        <section class="container">
            <div class="wrapper">
            <h2>Projects</h2>

            <div class="projects grid">

            <!-- Include Project Cards -->
            <?php include "codeSnippets/projectcards.php" ?>


            </div>
        </section>
        </div>
    </main>  

<?php include "templates/footer.php" ?>