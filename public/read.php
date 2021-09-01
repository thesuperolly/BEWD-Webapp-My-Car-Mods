
<!-- Calling header template -->
<?php include "templates/header.php"; ?> 

<h2>Results</h2>
<div class="projects grid">
<?php
if (isset($_POST['submit'])) {
    //if there are some results
    if ($result && $statement->rowCount() > 0) { ?>
        
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
        <?php }; //close the foreach
    };
};
?>
</div>
    
<form method="post">
<input type="submit" name="submit" value="View all">
</form>



<!-- Calling footer template -->
<?php include "templates/footer.php"; ?>    