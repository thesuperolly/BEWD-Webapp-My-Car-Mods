<?php
// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
    // include the config file that we created before
    require "../config.php";
    // this is called a try/catch statement
    try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);

        // SECOND: Get the contents of the form and store it in an array
        $new_project = array(
        "projectname"        => $_POST['projectname'],
        "projectdescription" => $_POST['projectdescription'],
        "projectstatus"      => $_POST['projectstatus'],
        "projecttype"        => $_POST['projecttype'],
        "projectimage"       => $_POST['projectimage'],
        );

        // THIRD: Turn the array into a SQL statement
        $sql = "INSERT INTO projects (
            projectname, 
            projectdescription, 
            projectstatus,
            projecttype,
            imagelocation
            ) VALUES (
                :projectname, 
                :projectdescription, 
                :projectstatus,
                :projecttype,
                :projectimage
            )";
       
        // FOURTH: Now write the SQL to the database
        $statement = $connection->prepare($sql);
        $statement->execute($new_project);

    } catch(PDOException $error) {

    // if there is an error, tell us what it is
    echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<!-- Calling header template -->
<?php include "templates/header.php"; ?> 
<h2>Add a work</h2>



<!-- Create project form -->
<!-- Project title -->
<form method="post">
    <div class="form-group">
        <label class="form-label" for="projectname">Project</label>
        <input class="form-input" type="text" id="projectname" name="projectname" placeholder="New tyres?">
    </div>

    <!-- Project description -->
    <div class="form-group">
        <label class="form-label" for="projectdescription">Description</label>
        <textarea class="form-input" type="text" id="projectdescription" name="projectdescription" placeholder="what are the details?">
</textarea>
    </div>

    <!-- Project Type -->
    <div class="form-group">
        <label class="form-label">Project Type</label>
        <label class="form-radio">
            <input type="radio" id="maintenance" name="projecttype" value="Maintenance" checked>
            <i class="form-icon"></i> Maintenance
        </label>
        <label class="form-radio">
            <input type="radio" id="modification" name="projecttype" value="Modification">
            <i class="form-icon"></i> Modification
        </label>
    </div>
    
    
    <!-- Project Status -->
    <div class="form-group">
        <label class="form-label">Project Status</label>
        <label class="form-radio">
            <input type="radio" id="notstarted" name="projectstatus" value="Not Started" checked>
            <i class="form-icon"></i> Not Started
        </label>
        <label class="form-radio">
            <input type="radio" id="inprogress" name="projectstatus" value="In Progress">
            <i class="form-icon"></i> In Progress
        </label>
        <label class="form-radio">
            <input type="radio" id="completed" name="projectstatus" value="Completed">
            <i class="form-icon"></i> Completed
        </label>
    </div>

    <!-- Project Image -->
    <div class="form-group">
        <label class="form-label" for="projectimage">Image</label>
        <input class="form-input" type="file" id="projectimage" name="projectimage">
    </div>

    <!-- Form Submit -->
    <input class="btn btn-primary input-group-btn" type="submit" name="submit" value="Create Project">
    <?php if (isset($_POST['submit']) && $statement) { ?>
        <h5>Work successfully added.</h5>
    <?php } ?>
</form>





<!-- Calling footer template -->
<?php include "templates/footer.php"; ?>    
