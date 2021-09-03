<?php 

    // initialize the session.
    include "codeSnippets/start_session.php";

    // checks is user is loggin in and redirects to login page if not.
    include "codeSnippets/loginCheck.php";

    // include the config file that we created last week
    require "../config.php";
    require "common.php";



    // run when submit button is clicked
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            //grab elements from form and set as varaible
            $project =[
              "id"                 => $_POST['id'],
              "projectname"        => $_POST['projectname'],
              "projectdescription" => $_POST['projectdescription'],
              "projectstatus"      => $_POST['projectstatus'],
              "projecttype"        => $_POST['projecttype'],
              "projectimage"       => $_POST['projectimage']
            ];
            
            // create SQL statement
            $sql = "UPDATE `projects` 
                    SET id             = :id,
                    projectname        = :projectname, 
                    projectdescription = :projectdescription, 
                    projectstatus      = :projectstatus, 
                    projecttype        = :projecttype, 
                    imagelocation      = :projectimage 
                    WHERE id = :id";

            //prepare sql statement
            $statement = $connection->prepare($sql);
            
            //execute sql statement
            $statement->execute($project);


        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
        header("Location:welcome.php");
    }

    // GET data from DB
    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
        //yes the id exists 
        try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM projects WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new project variable so we can access it in the form
            $project = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    };
?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Work successfully updated.</p>
<?php endif; ?>

<h2>Edit a project</h2>

<a href='delete.php?delete=<?php echo $project['id']; ?>'>Delete</a>

<form method="POST">

    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <!-- Project Name -->
    <div class="form-group">
        <label class="form-label" for="projectname"><h5>Project</h5></label>
        <input class="form-input" type="text" id="projectname" name="projectname" placeholder="New tyres?" value="<?php echo escape($project['projectname']); ?>" required>
    </div>

    <!-- Project description -->
    <div class="form-group">
        <label class="form-label" for="projectdescription"><h5>Description</h5></label>
        <textarea class="form-input" type="text" id="projectdescription" name="projectdescription" placeholder="what are the details?" required><?php echo escape($project['projectdescription']); ?></textarea>
    </div>

    <!-- Project Type -->
    <div class="form-group">
        <label class="form-label">Project Type</label>
        <label class="form-radio">
            <input type="radio" id="maintenance" name="projecttype" value="Maintenance" <?php if($project['projecttype']=="Maintenanace"){ echo "checked";}?>>
            <i class="form-icon"></i> Maintenance
        </label>
        <label class="form-radio">
            <input type="radio" id="modification" name="projecttype" value="Modification" <?php if($project['projecttype']=="Modification"){ echo "checked";}?>>
            <i class="form-icon"></i> Modification
        </label>
    </div>
    
    
    <!-- Project Status -->
    <div class="form-group">
        <label class="form-label">Project Status</label>
        <label class="form-radio">
            <input type="radio" id="notstarted" name="projectstatus" value="Not Started" <?php if($project['projectstatus']=="Not Started"){ echo "checked";}?>>
            <i class="form-icon"></i> Not Started
        </label>
        <label class="form-radio">
            <input type="radio" id="inprogress" name="projectstatus" value="In Progress" <?php if($project['projectstatus']=="In Progress"){ echo "checked";}?>>
            <i class="form-icon"></i> In Progress
        </label>
        <label class="form-radio">
            <input type="radio" id="completed" name="projectstatus" value="Completed" <?php if($project['projectstatus']=="Completed"){ echo "checked";}?>>
            <i class="form-icon"></i> Completed
        </label>
    </div>

    <!-- Project Image -->
    <div class="form-group">
        <label class="form-label" for="projectimage">Image</label>
        <input class="form-input" type="file" id="projectimage" name="projectimage" value="<?php echo escape($project['imagelocation']); ?>">
    </div>

    <!-- Form Submit -->
    <input class="btn btn-primary input-group-btn" type="submit" name="submit" value="Save">
</form>

    <?php include "templates/footer.php";?>