

<!-- accessing Project data -->
<?php

// Initialize the session
session_start();

// this code will only execute after the submit button is clicked
if (isset($_SESSION['id'])) {
    // include the config file that we created before
    require "../config.php";

    // this is called a try/catch statement
    try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);

        // SECOND: Create the SQL
        $sql = "SELECT * FROM projects";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();

    } catch(PDOException $error) {
    // if there is an error, tell us what it is
    echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<!-- ==============In page Content============= -->

<!-- Calling header template -->
<?php include "templates/header.php"; ?> 


<!-- Hero START -->
<div class="hero hero-sm">
  <div class="container">
    <div class="hero-body">
      <h1>Welcome to My Car Mods</h1>
      <p>Track your car Mods and Maintenance. </p>
      <?php
      if (isset($_SESSION['id'])){
        echo '<button class="btn btn-lg"><a href="create.php">Create a new Project</a></button>';
      } else{
        echo '<button class="btn btn-lg"><a href="register.php">Register Now</a></button>';
      }
      ?>
    </div>
  </div>
</div>
<!-- Hero END -->

<!-- Main Section START -->
<main>
  <section class="container">
    <h2>Projects</h2>

    <div class="projects grid">

    <!-- Include Project Cards -->
    <?php include "templates/projectcards.php" ?>


    </div>
  </section>
</main>  
<!-- Main Section END -->



<!-- Calling footer template -->
<?php include "templates/footer.php"; ?>    
