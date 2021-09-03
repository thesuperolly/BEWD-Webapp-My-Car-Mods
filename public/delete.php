<!-- DELETE PROCESS CODE -->
<?php 

    // initialize the session.
    // include "codeSnippets/start_session.php";

    // checks is user is loggin in and redirects to login page if not.
    // include "codeSnippets/loginCheck.php";
    

    // include the config file that we created last week
    require "../config.php";
    require "common.php";

    include "codeSnippets/deletePageCode.php";
?>

<?php include "templates/header.php"; ?>

<?php if($deleted == true){
    echo '<h2>Project Deleted Successfully</h2>';
    echo '<a class="btn" href="welcome.php">Back to My Projects</a>';
    header("location: welcome.php");
    exit();
}  ?>

<?php include "templates/footer.php"; ?>