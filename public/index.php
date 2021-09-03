

<!-- accessing Project data -->
<?php

// initialize the session.
include "codeSnippets/start_session.php";



// this code will only execute if the user is logged in.
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

        echo '<button class="btn btn-lg"><a href="register.php">Register Now</a></button>';
        echo '<button class="btn btn-lg"><a href="login.php">Sign In</a></button>';
      ?>
    </div>
  </div>
</div>
<!-- Hero END -->

<!-- Main Section START -->
<main>
  <section class="container">
    <h2>What is My Car Mods?</h2>
    <p>insert about info here...</p>

    <div class="projects grid">

    <!-- Include Project Cards -->
    <!-- <?php include "templates/projectcards.php" ?> -->


    </div>
  </section>
</main>  
<!-- Main Section END -->



<!-- Calling footer template -->
<?php include "templates/footer.php"; ?>    
