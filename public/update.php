<?php
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
?>
<!-- Calling header template -->
<?php include "templates/header.php"; ?> 

<!-- PAGE CONTENT -->

<h2>Results</h2>
<div class="projects grid"> 
    <?php
        // This is a loop, which will loop through each result in the array
        foreach($result as $row) {
    ?>

            <div class="card">
                <div class="card-image">
                    <img src="assets/img/test.jpg" class="img-responsive">
                </div>

                <div class="card-header">
                    <h4 class="card-title"><?php echo $row['projectname']; ?></h4>
                    <div class="card-subtitle"><?php echo $row['projectstatus']; ?></div>
                    <div class="card-subtitle"><?php echo $row['projecttype']; ?></div>
                </div>

                <div class="card-body">
                <?php echo $row['projectdescription']; ?>
                </div>

                <div class="card-footer">
                    <p>Updated: <span>24/8/21</span></p>
                    <button class="btn btn-primary"><a href='update-project.php?id=<?php echo $row['id']; ?>'>Edit Project</a></button>
                </div>
            </div>

    <!-- </p> -->
    <?php
    // this willoutput all the data from the array
    // echo '<pre>'; var_dump($row);
    ?>
    <?php }; //close the foreach?>
</div>
    
<form method="post">
<input type="submit" name="submit" value="View all">
</form>



<!-- Calling footer template -->
<?php include "templates/footer.php"; ?>    