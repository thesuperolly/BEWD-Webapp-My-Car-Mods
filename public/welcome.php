<?php
// initialize the session.
include "codeSnippets/start_session.php";
 
// checks is user is loggin in and redirects to login page if not.
include "codeSnippets/loginCheck.php";
?>

<?php
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
 

<?php include "templates/header.php" ?>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your project page.</h1>
    </div>
    <p>
        <a href="create.php" class="btn">Create A New Project</a>
        <!-- <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a> -->
    </p>

    <main>
        <section class="container">
            <h2>Projects</h2>

            <div class="projects grid">

            <!-- Include Project Cards -->
            <?php include "codeSnippets/projectcards.php" ?>


            </div>
        </section>
    </main>  

<?php include "templates/footer.php" ?>